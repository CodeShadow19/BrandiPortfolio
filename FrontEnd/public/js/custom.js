
/*** CONTACT FORM SEND DATA ***/
/*$('.contactClass').on('submit',function (event){
    event.preventDefault();
    let formData=$(this).serializeArray();

    let name=formData[0]['value'];
    let email=formData[1]['value'];
    let message=formData[1]['value'];
    console.log(formData);

    let url="/contactSend";

    alert(name+email+message);
});*/

$('#form-submit').click(function(){
    var name=$('#name').val();
    var email=$('#email').val();
    var message=$('#message').val();

    //alert(name+email+message);

    sendContact(name,email,message);
});

function sendContact(name,email,message){
    if(name.length==0){
        $('#form-submit').val("Name Empty.")
        setTimeout(function (){
            $('#form-submit').val('SEND MESSAGE');
        },3000)
    }else if(email.length==0){
        $('#form-submit').val("Email Empty.")
        setTimeout(function (){
            $('#form-submit').val('SEND MESSAGE');
        },3000)
    }else if(message.length==0){
        $('#form-submit').val("Message Empty.")
        setTimeout(function (){
            $('#form-submit').val('SEND MESSAGE');
        },3000)
    }else{
        axios.post('/contactSend',{
            name:name,
            email:email,
            message:message
        }).then(function(response){
            if(response.status==200 && response.data==1){
                $('#form-submit').val("Message Send Success")
                setTimeout(function (){
                    $('#form-submit').val('SEND MESSAGE');
                },3000)
            }else{
                $('#form-submit').val("Message Send Failed")
                setTimeout(function (){
                    $('#form-submit').val('SEND MESSAGE');
                },3000)
            }
        }).catch(function(error){
            $('#form-submit').val("Message Send Failed")
            setTimeout(function (){
                $('#form-submit').val('SEND MESSAGE');
            },3000)
        })
    }
}

/* ========================================================================= */
/*	Preloader
/* ========================================================================= */

jQuery(window).load(function(){

	$("#preloader").fadeOut("slow");

});


$(document).ready(function(){

	/* ========================================================================= */
	/*	Menu item highlighting
	/* ========================================================================= */

	jQuery('#nav').singlePageNav({
		offset: jQuery('#nav').outerHeight(),
		filter: ':not(.external)',
		speed: 1200,
		currentClass: 'current',
		easing: 'easeInOutExpo',
		updateHash: true,
		beforeStart: function() {
			console.log('begin scrolling');
		},
		onComplete: function() {
			console.log('done scrolling');
		}
	});

    $(window).scroll(function () {
        if ($(window).scrollTop() > 400) {
            $("#navigation").css("background-color","#0EB493");
        } else {
            $("#navigation").css("background-color","rgba(16, 22, 54, 0.2)");
        }
    });

	/* ========================================================================= */
	/*	Fix Slider Height
	/* ========================================================================= */

	var slideHeight = $(window).height();

	$('#slider, .carousel.slide, .carousel-inner, .carousel-inner .item').css('height',slideHeight);

	$(window).resize(function(){'use strict',
		$('#slider, .carousel.slide, .carousel-inner, .carousel-inner .item').css('height',slideHeight);
	});


	/* ========================================================================= */
	/*	Portfolio Filtering
	/* ========================================================================= */


    // portfolio filtering

    $(".project-wrapper").mixItUp();


	$(".fancybox").fancybox({
		padding: 0,

		openEffect : 'elastic',
		openSpeed  : 650,

		closeEffect : 'elastic',
		closeSpeed  : 550,

		closeClick : true,
	});

	/* ========================================================================= */
	/*	Parallax
	/* ========================================================================= */

	$('#facts').parallax("50%", 0.3);

	/* ========================================================================= */
	/*	Timer count
	/* ========================================================================= */

	"use strict";
    $(".number-counters").appear(function () {
        $(".number-counters [data-to]").each(function () {
            var e = $(this).attr("data-to");
            $(this).delay(6e3).countTo({
                from: 50,
                to: e,
                speed: 3e3,
                refreshInterval: 50
            })
        })
    });

	/* ========================================================================= */
	/*	Back to Top
	/* ========================================================================= */


    $(window).scroll(function () {
        if ($(window).scrollTop() > 400) {
            $("#back-top").fadeIn(200)
        } else {
            $("#back-top").fadeOut(200)
        }
    });
    $("#back-top").click(function () {
        $("html, body").stop().animate({
            scrollTop: 0
        }, 1500, "easeInOutExpo")
    });

});


// ==========  START GOOGLE MAP ========== //
function initialize() {
    var myLatLng = new google.maps.LatLng(22.402789, 91.822156);

    var mapOptions = {
        zoom: 14,
        center: myLatLng,
        disableDefaultUI: true,
        scrollwheel: false,
        navigationControl: false,
        mapTypeControl: false,
        scaleControl: false,
        draggable: false,
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'roadatlas']
        }
    };

    var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);


    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: 'img/location-icon.png',
        title: '',
    });

}

google.maps.event.addDomListener(window, "load", initialize);
// ========== END GOOGLE MAP ========== //



