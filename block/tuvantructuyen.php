 
<!--tu van truc tuyen-->
			<div class="row chat-window col-xs-5 col-md-4" id="chat_window_1" style="margin-left:10px;">
		        <div class="col-xs-12 col-md-12">
		        	<div class="panel panel-default">
		                <div class="panel-heading top-bar">
		                    <div class="col-md-8 col-xs-8">
		                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Tư vấn trực tuyến</h3>
		                    </div>
		                    <div class="col-md-4 col-xs-4" style="text-align: right;">
		                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
		                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
		                    </div>
		                </div>
		                <div class="panel-body msg_container_base">
		                    
		                    <div id="fb-root"></div>
							<script>(function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=173855609626114";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                            <!--Hết đoạn 1-->
                             
                            <!--Đoạn 2-->
                            <script>
                                jQuery(document).ready(function () {
                                    jQuery(".chat_fb").click(function() {
                                        jQuery('#minimize-facechat').toggle();
                                        jQuery('.fchat').toggle(100);
                                    });
                                });
                            </script>
                            <div id="cfacebook">
                                <a href="javascript:" class="chat_fb"><i class="fa fa-facebook-square"></i><span id="minimize-facechat"></span></a>
                                <div class="fchat">
                                    <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/medwiki.vn/" data-width="400" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
                                </div>
                            </div>
                            <!--Hết đoạn 2-->
		                    
		                </div>
		                
		    		</div>
		        </div>
		    </div>
		    <!--end tu van truc tuyen-->