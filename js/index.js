//icon-show hover
$(function() {
    $('.icon_show li img').hover(function() {
        $(this).addClass('animated');
        $(this).addClass('swing');
    }, function() {
        $(this).removeClass('animated');
        $(this).removeClass('swing');
    })
})

//guestbook border
$(function() {
    $('#contactform .key').focus(function() {
        $(this).addClass('boxshadow')
    });
    $('#contactform .key').blur(function() {
        $(this).removeClass('boxshadow')
    });
})

//替换敏感字符串
// var inputName = $('#name').value;
// var inputMessage = $("#message").value;
// inputName = inputName.replaceAll("<script(?:[^<]++|<(?!/script>))*+</script>", "<script>"); 
// while(inputName.contains("</script>")){ 
//      inputName = inputName.replaceAll("<script(?:[^<]++|<(?!/script>))*+</script>", "<script>"); 
// };
// inputMessage = inputMessage.replaceAll("<script(?:[^<]++|<(?!/script>))*+</script>", "<script>"); 
// while(inputMessage.contains("</script>")){ 
//      inputMessage = inputMessage.replaceAll("<script(?:[^<]++|<(?!/script>))*+</script>", "<script>"); 
// }

//留言表单验证
$('#submit').click(function() {
    if (contactform.name.value == "") {
        // alert("请填写用户名");
        $('.error:eq(0)').html('Please enter your name.');
        contactform.name.focus();
        return false;
    }
    if (contactform.email.value == "") {
        $('.error:eq(1)').html('Please enter your email.');
        contactform.email.focus();
        return false;
    }
    if (contactform.message.value == "") {
        $('.error:eq(2)').html('Please enter your message.');
        contactform.message.focus();
        return false;
    }
    if (contactform.email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
        $('.error:eq(1)').html('The email is invalid.');
        return false;
    } else {
        $('form').hide();
        $('.reply').show();
        $('.reply').html('Thank you, I have received your message!');
    }
})



// $('#submit').click(function(){
//  if ($('#name').value==""||$('#email').value==""||$('#message').value=="")
//   {return false;}
//  else{
//      $.ajax({
//          type:"POST",
//          url:"form.php",
//          data:{
//              name:$('#name').val(),
//              email:$('#email').val(),
//              message:$('#message').val()
//          },
//          success:function(data){
//              if(data!="f|a|i|l"){
//                  alert("Thank you,I have received your message!")
//              }else{
//                  alert("Sorry,message received failur.")
//              }
//              $('.key').val("");
//          },
//      })
//  }
// })

//微信二维码弹框
$(".weixin").click(function() {
    $('.dialog').fadeIn(600);
    $('.dialog').addClass('bounceInDown');
})
$('.close').click(function() {
    $('.dialog').fadeOut(600);
})
$('.dialog_outer').click(function() {
    $('.dialog').fadeOut(600);
})

//ESC键退出弹框
$(window).keydown(function() {
    var e = window.event || event;
    var keycode = e.keyCode;
    if (keycode == 27) {
        $('.dialog').fadeOut(600);
    }
})

//返回顶部
//回到顶部功能的实现
$(function() {
    //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
    $(window).scroll(function() {
        if ($(window).scrollTop() > 100) {
            $(".scrollup").fadeIn(200);
        } else {
            $(".scrollup").fadeOut(200);
        }
    });
    //当点击跳转链接后，回到页面顶部位置
    $(".scrollup").click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 300);
        return false;
    });
});

//关闭ie升级提示框
$(function() {
    $('.close').click(function() {
        $('.ie-alert').css('display', 'none');
    })
})



