  $(document).ready(function(){
    $('.modal').modal();
    // Initialize collapse button
    $(".button-collapse").sideNav();
    // Initialize collapsible (uncomment the line below if you use the dropdown variation)
    $('.collapsible').collapsible();



    //////////////////////////////////////////////////////////////////
    $("#btn_list_add").click(function(){
      var list_name = $("#add_list").val()
      $("#add_list").val('')
      var checkIfEmpty = list_name.replaceAll(' ', '')
      if(checkIfEmpty.length > 0){
        $('#modal1').modal('close');
        $.ajax({
          url: "controller/addlist_controller.php",
          type: 'POST',
          data: { 'list_name': list_name },
          dataType: 'json',
          success: function(result) {
             console.log(result)
             var codeString = ""
             for(var r in result){
              console.log(result[r].id)
              codeString += "<li data-value='"+result[r].id+"'><a class='waves-effect' href='#'><i class='material-icons'>playlist_add_check</i>"+result[r].name
              if(result[r].done_count != null){
                codeString += "<span class='badge' id='count'>"+result[r].done_count+"</span>"
              }else{
                codeString += "<span class='badge' id='count'></span>"
              }
              codeString += "</a></li>"
             }

             $("#todolists").html(codeString)

              $("#todolists>li").click(function(){
                var list_id = $(this).attr('data-value')
                $("#todolists>li").removeClass('active')
                $("#important").removeClass('active')
                $(this).addClass('active')
          
                console.log(list_id)
                $.ajax({
                  url: "controller/taskview_controller.php",
                  type: 'POST',
                  data: { 'list_id': list_id },
                  dataType: 'json',
                  success: function(result) {
                    console.log(result)
                    $("#todo_title").text(result.list_name.name)
                    $("#todo_title").attr('data-value', result.list_name.id)
          
                    makeList(result.task_list)
                  },
                  error: function() {
                      console.log('error');
                  }
                })
              })
          },
          error: function() {
              console.log('error');
          }
        })
      }else{
        Materialize.toast('Input failed!', 1000)
      }
      
      
    })

    $("#todolists>li").click(function(){
      var list_id = $(this).attr('data-value')
      $("#todolists>li").removeClass('active')
      $("#important").removeClass('active')
      $(this).addClass('active')

      console.log(list_id)
      $.ajax({
        url: "controller/taskview_controller.php",
        type: 'POST',
        data: { 'list_id': list_id },
        dataType: 'json',
        success: function(result) {
           console.log(result)
           $("#todo_title").text(result.list_name.name)
           $("#todo_title").attr('data-value', result.list_name.id)

           makeList(result.task_list)
        },
        error: function() {
            console.log('error');
        }
      })
    })

    $("#btn_addtask").click(function(){
      var task_name = $("#add_task").val()
      $("#add_task").val('')
      var list_id = Number($("#todo_title").attr('data-value'))

      var checkIfEmpty = task_name.replaceAll(' ', '')
      if(checkIfEmpty.length > 0){
        if(list_id>0){
          $.ajax({
            url: "controller/addtask_controller.php",
            type: 'POST',
            data: { 'task_name': task_name, 'list_id': list_id},
            dataType: 'json',
            success: function(result) {
              makeList(result)
              changeBadge()
            },
            error: function() {
                console.log('error');
            }
          })
        }else{
          Materialize.toast('Select the Todo List', 1000)
        }
      }else{
        Materialize.toast('Input failed!', 1000)
      }
    })

    $("#important").click(function(){
      $("#todolists>li").removeClass('active')
      $(this).addClass('active')
      console.log("this is important")
      $("#todo_title").text("Important")

      $("#todo_title").attr('data-value', 0)
      console.log("here is my value:", $("#todo_title").attr('data-value'))
      $.ajax({
        url: "controller/importantview_controller.php",
        type: 'GET',
        dataType: 'json',
        success: function(result) {
          console.log(result)

          var codeString = ""

          for(var r in result){
            codeString += "<div class='card br-card'>"
            codeString += "<div class='card-content' style='padding:0px;'>"
            codeString += "<div class='row' style='margin-bottom:0px'>"
            codeString += "<div class='col-sm-12 m-flex'>"
            codeString += "<div>"
            codeString += "<i class='material-icons btn-important r-im'>star_border</i>"
            codeString += "</div>"
            codeString += "<div>"
            codeString += "<div class='i-task-title'>"+result[r].task_name+"</div>"
            codeString += "<div class='i-list-title'>("+result[r].list_name+")</div>"
            codeString += "</div>"
            codeString += "</div>"
            codeString += "</div>"
            codeString += "</div>"
            codeString += "</div>"
          }
          $("#task_list").html(codeString)
        },
        error: function() {
            console.log('error');
        }
      })
    })

  });

function changeBadge(){
  var count = Math.abs($("input[type=checkbox]").length - $("input[type=checkbox]:checked").length);
  var data_value = $("#todo_title").attr('data-value')
  var badge = $("#todolists>li[data-value="+data_value+"]>a>span")
  console.log("this is when the value is empty:", badge)

  badge.html(count)

  if(count == 0){
    badge.html('')
  }else{
    badge.html(count)
  }
}

function makeList(objList){
    var codeString = ""
    for(var r in objList){
      console.log("hello", objList[r].is_important)
      codeString += "<div class='card'>"
      codeString += "<div class='card-content' style='padding:0px;'>"
      codeString += "<div class='row' style='margin-bottom:0px'>"
      codeString += "<div class='col-sm-12 d-flex' data-value='"+objList[r].id+"'>"
      codeString += "<div>"
      codeString += "<input type='checkbox' class='filled-in' id='filled-in-box-"+objList[r].id
      if(objList[r].is_done == '1'){
        codeString += "' checked='checked' />"
      }else{
        codeString += "'/>"
      }
      codeString += "<label for='filled-in-box-"+objList[r].id+"' "
      if(objList[r].is_done == '1'){
        codeString += "class='is-done'>"+objList[r].task_name+"</label>"
      }else{
        codeString += ">"+objList[r].task_name+"</label>"
      }
      
      codeString += "</div>"
      codeString += "<div>"
      if(objList[r].is_important == '1'){
        codeString += "<i class='material-icons btn-important'>star</i>"
      }else{
        codeString += "<i class='material-icons btn-important'>star_border</i>"
      }
      codeString += "<i class='material-icons btn-delete'>delete_forever</i>"
      codeString += "</div>"
      codeString += "</div>"
      codeString += "</div>"
      codeString += "</div>"
      codeString += "</div>"
    }

    $("#task_list").html(codeString)

    $("input[type=checkbox]").click(function(){
      changeBadge()
      var is_done = 0
      if($(this).prop("checked") == true){
        $(this).next().addClass("is-done");
        is_done = 1;
      }
      else if($(this).prop("checked") == false){
        $(this).next().removeClass("is-done");
      }

      var task_id = $(this).parent().parent().attr('data-value')

      $.ajax({
        url: "controller/isdone_controller.php",
        type: 'POST',
        data: { 'is_done': is_done, 'task_id': task_id },
        dataType: 'json',
        success: function(result) {
           console.log(result)
        },
        error: function() {
            console.log('error');
        }
      })
    })

    $(".btn-important").click(function(){
      var is_important = 0
      if($(this).html() == 'star_border'){
        $(this).html('star')
        is_important = 1
      }else{
        $(this).html('star_border')
      }

      var task_id = $(this).parent().parent().attr('data-value')

      $.ajax({
        url: "controller/isimportant_controller.php",
        type: 'POST',
        data: { 'is_important': is_important, 'task_id': task_id },
        dataType: 'json',
        success: function(result) {
           console.log(result)
        },
        error: function() {
            console.log('error');
        }
      })

    })

    $(".btn-delete").click(function(){
      var task_id = $(this).parent().parent().attr('data-value')
      $(this).parent().parent().parent().parent().parent().remove()
      console.log(task_id)
      $.ajax({
        url: "controller/deletetask_controller.php",
        type: 'POST',
        data: { 'task_id': task_id },
        dataType: 'json',
        success: function(result) {
           console.log(result)
           changeBadge()
        },
        error: function() {
            console.log('error');
        }
      })

    })

    
  }

  