// Timeout popup warning

//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0 
//## United States License. To view a copy of this license, 
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter 
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//######

(function($){
 $.fn.idleTimeout = function(options) {
    var defaults = {
			inactivity: 1200000, //20 Minutes
			noconfirm: 10000, //10 Seconds
			sessionAlive: 30000, //10 Minutes
			redirect_url: 'login_process.php?act=4236a440a662cc8253d7536e5aa17942',
			click_reset: true,
			alive_url: '#',
			logout_url: 'login_process.php?act=cd91e7679d575a2c548bd2c889c23b9e'
		}
    
    //##############################
    //## Private Variables
    //##############################
    var opts = $.extend(defaults, options);
    var liveTimeout, confTimeout, sessionTimeout;
    var modal = "<div id='modal_pop'><p>You are about to be signed out due to inactivity. If you don't respond to this message, you'll be logged out in 20 minutes.</p></div>";
    //##############################
    //## Private Functions
    //##############################
    var start_liveTimeout = function()
    {
      clearTimeout(liveTimeout);
      clearTimeout(confTimeout);
      liveTimeout = setTimeout(logout, opts.inactivity);
      
      if(opts.sessionAlive)
      {
        clearTimeout(sessionTimeout);
        sessionTimeout = setTimeout(keep_session, opts.sessionAlive);
      }
    }
    
    var logout = function()
    {
      
      confTimeout = setTimeout(redirect, opts.noconfirm);
/* was      $(modal).dialog({
        buttons: {"Stay Logged In":  function(){
          $(this).dialog('close');
          stay_logged_in();
        }},
        modal: true,
        title: 'Auto Logout'
      });
*/
	$(modal).dialog({
	buttons: {"Stay Logged In": function(){
		$(this).dialog('close');
		}},
		modal: true,
		title: 'Session inactivity for 3 hours',
		close: function(event, ui) {
		stay_logged_in();
		}
		});
    }
    
/* was    var redirect = function()
    {
      if(opts.logout_url)
      {
        $.get(opts.logout_url);
      }
      window.location.href = opts.redirect_url;
    }
*/
	var redirect = function()
	{
		window.location.href = opts.logout_url;
	}

    var stay_logged_in = function(el)
    {
      start_liveTimeout();
      if(opts.alive_url)
      {
        $.get(opts.alive_url);
      }
    }
    
    var keep_session = function()
    {
      $.get(opts.alive_url);
      clearTimeout(sessionTimeout);
      sessionTimeout = setTimeout(keep_session, opts.sessionAlive);
    } 
    
    //###############################
    //Build & Return the instance of the item as a plugin
    // This is basically your construct.
    //###############################
    return this.each(function() {
      obj = $(this);
      start_liveTimeout();
      if(opts.click_reset)
      {
        $(document).bind('click', start_liveTimeout);
      }
      if(opts.sessionAlive)
      {
        keep_session();
      }
    });
    
 };
})(jQuery);
