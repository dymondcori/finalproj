// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=CLIENT_ID_HERE&redirect_uri=REDIRECT_URI_HERE&response_type=token

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id
function loadFlickr() {
	var html = ""
	var apiurl = "http://api.flickr.com/services/feeds/photos_public.gne?tags=rhcp&tagmode=any&format=json&jsoncallback=?"
	$(document).ready(function(){
					console.log("document ready")
					$.getJSON(apiurl,function(json){
							console.log(json);
							$("#results").append('<p>"'+json.title+'"</p>');

							$.each(json.items,function(i,data){
								//	html += '<p>From:"'+ data.author_id+'"</p>';
									html += '<img src ="' + data.media.m + '">'
									});
							console.log(html);
							$("#Flickr").append(html);
					});
				});
				loadInstagram();
		}


function loadInstagram() {
	var apiurl = "https://api.instagram.com/v1/tags/rhcp/media/recent?access_token=17291982.0e2f2f9.7ec747ef07674524aafa479f31e9c018&response_type=token&callback=?"
	var access_token = location.hash.split('=')[1];
	var html = ""

		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: apiurl,
			success: parseData
		});


		function parseData(json){
			console.log(json);

			$.each(json.data,function(i,data){
			//	html += '<p>Filter:"'+ data.filter+'"</p>';

		 html += '<div class="instabox"> '
			//	html += '<a target="_blank" href="http://www.instagram.com/' + data.user.username + '">'

			//USER
			html += '<strong> <a target="_blank" href="http://www.instagram.com/' + data.user.username + '">' + data.user.username + '</span></a></strong>'

			//picture
			html += '<div class= "instapic"><img src ="' + data.images.low_resolution.url + '"></div>';

			//likes and caption
			html += '<div class="instagram-caption-div">'
			html += '&#9825;  ' + data.likes.count
			html += '<br><div class="chatbubble"></div>'
			html += '<span class="instagram-username-caption">'
			//html += '<strong> <a target="_blank" href="http://www.instagram.com/' + data.user.username + '">' + data.user.username + '</span></a></strong>'
			html += '<div class="hashtags">' + data.caption.text + '</div>'
			html += '</div>'

			});

			html += '</div>'

			//end row
			// html += '</div>'



			//end of loop
			// html += '</div> </div>'

			console.log(html);
			$("#instagram").append(html);

		}

 };


	$(document).ready(function(){
	console.log("doc ready!");
	loadFlickr();
		})
