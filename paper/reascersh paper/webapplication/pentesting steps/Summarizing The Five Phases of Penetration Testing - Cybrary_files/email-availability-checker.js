jQuery(document).ready(function() {

    var jq=jQuery;

    //append a loading box
    jq(document).on('blur', _EmailChecker.selectors, function()
    {
        var $wrapper = jq(this).parent('.email_checker');

        if(!$wrapper.get(0)) {
            $wrapper = createWrapper(this);
        }

        jq('.email-info', $wrapper).empty();//hide the message
        //show loading icon
        jq('.loading', $wrapper).css({display:'block'});

        var email = jq(this).val();

        jq.post(ajaxurl, {
            action: 'check_email',
            cookie: encodeURIComponent(document.cookie),
            email: email
        },
        function(resp)
        {
            if(resp && resp.code != undefined && resp.code == 'success') {
                showMessage($wrapper, resp.message, 0);
            } else {
                showMessage($wrapper, resp.message, 1);
            }
        },
        'json'
        );
    });//end of onblur

    /**
     * Show message within the wrapper and give span tag appropriate class
     * @param  $wrapper
     * @param  msg
     * @param  isError
     */
    function showMessage($wrapper, msg, isError)
    {//hide ajax loader
        jq('.email-info', $wrapper).removeClass('available error');
        jq('.loading', $wrapper).css({display:'none'});
        jq('.email-info', $wrapper).html(msg);
        if(isError) {
            jq('.email-info', $wrapper).addClass('error');
        } else {
            jq('.email-info', $wrapper).addClass('available');
        }
    }

    /**
     * Create the wrapper around input fields
     * @param  element
     */
    function createWrapper(element)
    {
        var $wrapper = jq(element).parent('.email_checker');
        if(!$wrapper.get(0)) {
            jq(element).wrap( "<div class='email_checker'></div>");
            $wrapper = jq(element).parent('.email_checker');
            $wrapper.append("<span class='loading' style='display:none'></span>");
            $wrapper.append("<span class='email-info'></span>");
        }
        return $wrapper;
    }
});//end of dom ready
