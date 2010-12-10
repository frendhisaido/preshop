$(document).ready(function()
{
  
  $('.block').click(function()
    {
      var id= $(this).attr('id');
      var data_id= $(".data").html();
      var panel= $('.panel');
      var panel_width= $('.panel').css('left');
      
      if(data_id==id)
      {
        //animasi rolling disini
        panel.animate({left: parseInt(panel.css('left'),0)== 0 ?
        +panel.outerWidth() : 0}).animate({width:"675px"},1000);
      }
      else
      {
        if(panel_width='200px')
        {
          
        }
        else
        {
          panel.animate({left: parseInt(panel.css('left'),0) == 0 ?
          +panel.outerWidth() : 0}).animate({width:"200px"},100);
        }       
      }
      
      //disini passing isi yang bakal muncul di data di dalem panel
      $('.data').html(id);
      return false;
    });
    
  //ngeclose panel
  $('.close').click(function()
    {
      var panel= $('.panel');
      panel.animate({left: parseInt(panel.css('left'),0) == 0 ?
      +panel.outerWidth() :0}).animate({width:"199px"},500);
      return false;
    });   
  
});
