$(document).ready(function () {
  //your code here


$(function() {
            
            
            var feedbackTab = {
                
                speed:300,
                containerWidth:$('.feedback-panel').outerWidth(),
                containerHeight:$('.feedback-panel').outerHeight(),
                tabWidth:$('.feedback-tab').outerWidth(),
                
                init:function(){
                    $('.feedback-panel').css('height',feedbackTab.containerHeight + 'px');
                    $('.feedback-panel').animate({right:'-' + feedbackTab.containerWidth}, feedbackTab.speed)
                            .removeClass('open');
                    $('a.feedback-tab').click(function(event){

                        if ($('.feedback-panel').hasClass('open')) {
                            $('.feedback-panel').animate({right:'-' + feedbackTab.containerWidth}, feedbackTab.speed)
                            .removeClass('open');
                        } else {
                            $('.feedback-panel').animate({right:'0'},  feedbackTab.speed)
                            .addClass('open');
                        }
                        event.preventDefault();
                    });
                }
            };
            
            feedbackTab.init();
            
                return false;
           
     
            
        });

});
