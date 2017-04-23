$(document).ready(function() {

	/*** GLOBAL VARIABLES ***/
	var submitIcon = $('.search-button');
	var inputBox = $('.search-box');
	var searchForm = $('.search-form');
	var isOpen = false;

	/*** LISTENERS/EVENTS ***/

	$(".story").hover(
		function(e){
			$(this).children(".prevw-btn").toggleClass("hide");
			$(this).children("a:first").children("div").toggleClass("hide");
		}
	);

	$('#home-next').on('click', function(e){
	    $('html, body').animate({
	        scrollTop: $("#about").offset().top +10
	    }, 1500);
	});

	$('#signin-dropdown').on('click',function(){
		var x = setTimeout('$("#signin-uname").focus()', 10);
	});

	//edit button
	$('#writer-tools').on('click','#edit-chapter-btn',
		function(e){
			//get chapter text to be edited			
	        $.ajax({
			    url: $(location).attr('href').split('?')[0]+'/edit',
			    type: 'post',
			    headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			    success: function (data) {
					$('#chapModal > div').html(data);
					//set current chapter and focus on it
					$('#chapter-title').focus();
			    }
			});	
//			e.preventDefault();
        /*//disable nav buttons
        $('.screen').addClass('screen-activated');
        //display the story body
        $('.story-body').css('z-index','999');
        //disable other buttons
        $('.story-nav .btn').attr('disabled',true);
        //hide page navigation
        $('ul.pagination').hide();
		
		//add contenteditable attr
        $('.chapter-title, .chapter-text').attr('contenteditable', 'true');
        //set edit css attr
        $('span.chapter-title').addClass('chapter-title-edit');
        $('div.chapter-text').addClass('chapter-text-edit');
        //replace the buttons with reset and preview buttons
        $('#writer-tools').load('/storage/assets/html/edit-tools.html');*/
	});

	//preview changes button
	$('#writer-tools').on('click','#edit-preview-btn',
		function(e){
			//remove contenteditable attr
	        $('.chapter-title, .chapter-text').attr('contenteditable', 'false');
	        //set edit css attr
	        $('span.chapter-title').removeClass('chapter-title-edit');
	        $('div.chapter-text').removeClass('chapter-text-edit');
        	
	        //replace the buttons with cancel and save buttons
	        $('#writer-tools').load('/storage/assets/html/edit-tools-confirm.html');		
	});
	
	//cancel edit button
	$('#writer-tools').on('click','#edit-cancel-btn',
		function(e){
			if ($('#edit-cancel-btn').hasClass('confirm-btn')) {
				window.location.reload(true);
			}
			else {
				$(this)
					.addClass('confirm-btn')
					.children('span')
					.text("Are you sure?");				
			}
	});

	//save edit button
	$('#writer-tools').on('click','#edit-save-btn',
		function(e){
			if ($('#edit-save-btn').hasClass('confirm-btn')) {
                e.preventDefault();

				var chap_title = $('.chapter-title').text();
				var chap_par = "";

				//iterate through the paragraphs
				$('.chapter-text > p').each(function(){
					chap_par += $(this).text().trim() + "\n";
				});

				var data = {
					'chap_title': chap_title,
					'chap_par': chap_par				
				};

				//send the processed array to server
		    	$.post('ajax/updatechap', data,
		    		function(response,status){
		    			if (status == 'success') {
							//reload
							console.log(response);
							window.location.reload(true);
			    		}
			    		else {
			    			//handle ajax error
			    			console.log(status);
			    		}
		    		}
		    	);

                e.preventDefault();
		    	
			}
			else {
				$(this)
					.addClass('confirm-btn')
					.children('span')
					.text("Are you sure?");				
			}
	});

	//delete chapter button
	$('#writer-tools').on('click','#delete-chapter-btn',
		function(e){
			if ($('#delete-chapter-btn').hasClass('confirm-btn')) {

                e.preventDefault();
                
				//send the processed array to server

                $.ajax({
				    url: $(location).attr('href').split('?')[0]+'/delete',
				    type: 'post',
				    headers: {
					    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
				    dataType: 'json',
				    success: function (data) {				        
		    			if (data.status == 'success') {
							//redirect to the first chapter
							window.location.replace(
								$(location).attr('href')
										   .split('/chapter')[0]
							);
			    		}
			    		else {
			    			//handle ajax error
			    			console.log(data.status);
			    		}
				    }
				});


                e.preventDefault();
			}
			else {
				$(this)
					.addClass('confirm-btn')
					.children('span')
					.text("Are you sure?");			
			}
		}
	);

	//search box
	submitIcon.click(function(){
	    if(isOpen == false){
	        $('.search-form').css('display','inherit')
	        				 .animate({width: "500%"},400);
	        inputBox.focus();
	        isOpen = true;
	    } else {
	        $('.search-form').animate(
	        					{width: "0"},
	        					{
	        						duration: 400,
	        						complete: function() {
	        							$(this).css('display','none')
	        						}
	        					}
        					  );
	        				 
	        inputBox.focusout();
	        isOpen = false;
	    }
	});

	$('#signin-btn').click(function(e){
		e.stopPropagation();
		$('#signin-dropdown').click();
	});

	/* AJAX REQUESTS */

	$("#signin-form").submit(function(){
		console.log("form begin");
		//prevent default posting
    	event.preventDefault();

    	//get form data
    	var $form = $(this);

    	//cache all fields
    	var $fields = $form.find("input,button");

    	//serialize data
    	var data = $form.serialize();

    	//disable form fields
    	$fields.prop("disabled",true);

    	//display 'processing' message

		$("#signin-msg-holder").load('assets/html/alert.html',
			function(xhr){
				//add class for alert type
				$("#signin-msg-holder > div.alert").addClass("alert-info");	 
				//write message
				$("#signin-msg").html("<i class='fa fa-spin fa-spinner'></i>Signing in...");
				console.log(status+' '+xhr);
			}
		);

    	$.post('ajax/signin', data,
    		function(response,status){
    			if (status == 'success') {
	    			$form.delay(1000).queue(function(next) {
		    			//load message template
		    			$("#signin-msg-holder").load('assets/html/alert.html',
		    				function(){
								//add class for alert type
								$("#signin-msg-holder > div.alert").addClass("alert-"+response.status);	 
								//write message
								$("#signin-msg").html(response.content);
								//redirect to home if successful
								if (response.status == 'success') {
									//redirect to home page (after 3 seconds)
									$(this).delay(3000).queue(function(next){
										window.location.reload(true);
									});
								}
								else {
							    	//enable form fields if signin not successful
							    	$fields.prop("disabled",false);								
								}
		    				}
	    				);
		            	next();
		            });
	    		}
	    		else {
	    			//handle ajax error
	    			console.log(status);
	    		}
    		}
    	);

	});

	/*** MAIN ***/



});
