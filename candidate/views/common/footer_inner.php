			</div>



        </div>



        <div id="custom_notifications" class="custom-notifications dsp_none">

            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">

            </ul>

            <div class="clearfix"></div>

            <div id="notif-group" class="tabbed_notifications"></div>

        </div>

    <script src="<?php echo $this->config->base_url();?>js/listview.js"></script>
    
    <script type="text/javascript">
    
    function handle_response1(data){
        $("#hidden_container").empty();
        var response = $("#hidden_container").html(data);
        var status = response.find("status").html();
        if(status=="ok") return "Redirecting"
        else return response.find("message").html()
    }
    
    function do_hirewand_login(){
        /*var email = $("#username").val()
        var pass = $("#password").val()*/
		var email = '<?php echo $this->session->userdata('hireemail'); ?>'
        var pass = '<?php echo $this->session->userdata('hirepwd'); ?>'
        var url = 'http://peoplesearch.cherryhire.com/user/signin?email='+email+'&password='+pass+'&remember_me=true&GMTOffset=-330'
        $.ajax({
			url: url,
			dataType: 'html',	
			xhrFields: {
				withCredentials: true
			},
			success: function(data,status) {
						//alert(data);
				var resp = handle_response1(data)
						//alert(resp)
						if(resp=='Redirecting'){window.location = "http://peoplesearch.cherryhire.com/hire/dashboard"}
					}
	    });
    }
    
</script>

</body>



</html>    