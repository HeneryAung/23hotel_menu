<!-- PHP INCLUDES -->

<?php

    include "connect.php";
    include 'Includes/functions/functions.php';
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";


    //Getting website settings

    $stmt_web_settings = $con->prepare("SELECT * FROM website_settings");
    $stmt_web_settings->execute();
    $web_settings = $stmt_web_settings->fetchAll();

    $restaurant_name = "";
    $restaurant_email = "";
    $restaurant_address = "";
    $restaurant_phonenumber = "";

    foreach ($web_settings as $option)
    {
        if($option['option_name'] == 'restaurant_name')
        {
            $restaurant_name = $option['option_value'];
        }

        elseif($option['option_name'] == 'restaurant_email')
        {
            $restaurant_email = $option['option_value'];
        }

        elseif($option['option_name'] == 'restaurant_phonenumber')
        {
            $restaurant_phonenumber = $option['option_value'];
        }
        elseif($option['option_name'] == 'restaurant_address')
        {
            $restaurant_address = $option['option_value'];
        }
    }
?>

	<!-- HOME SECTION -->
<section class="home-section" id="home">
    <div class="container" 
        <div class="row" style="flex-wrap: nowrap;">
            <div class="col-md-6 home-left-section">
                <div style="padding: 280px 0px; color: white;">
                    <h1>
                        23 Hotel
						</h1>
                    <h2>
                        Escape_Unwind_Enjoy
                    </h2>
                    <hr>
                    <p>
                        
                    </p>
                    <div style="display: flex;">
                        <a href="#menus" class="bttn_style_2" style="display: flex;justify-content: center;align-items: center;">
                            VIEW MENU
                            <i class="fas fa-pen-nib"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

	<!-- OUR QUALITIES SECTION -->

	<section class="our_qualities" style="padding:50px 0px;">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="our_qualities_column">
	                    <img src="Design/images/service.png" >
	                    <div class="caption">
	                        <h3>
	                        Room service 
	                        </h3>
	                        <p>
							Available daily from 8:00 AM to 10:00 PM.
	                        </p>
	                    </div>
	                </div>
				</div>
				<div class="col-md-4">
					<div class="our_qualities_column">
	                    <img src="Design/images/quality_food_img.png" >
	                    <div class="caption">
	                        <h3>
	                           Meal service 
	                        </h3>
	                        <p>
							From |6am| until |8.30pm|.
	                        	Appetizers, Salads, and Main Dish can be ordered within the operation hours.
	                        </p>
	                    </div>
	                </div>
				</div>
				<div class="col-md-4">
					<div class="our_qualities_column">
	                    <img src="Design/images/mini.png" >
	                    <div class="caption">
	                        <h3>
							Snacks & Minibar
	                        </h3>
	                        <p>
	                        Avaliable at the Front Office.
	                        </p>
	                    </div>
	                </div>
				</div>

			</div>
		</div>
	</section>

	<!-- OUR MENUS SECTION -->
<section class="our_menus" id="menus">
    <div class="container">
        <h2 style="text-align: center;margin-bottom: 30px">DISCOVER OUR MENUS</h2>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle Slider with Flags</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

       .slider-container {
        position: relative;
        width: 250px;
        height: 60px;
    }

    .slider {
        position: relative;
        width: 100%;
        height: 100%;
        border-radius: 30px;
        background-color: #f0f0f0; /* Light background for slider */
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for depth effect */
    }

    .slider::before {
        content: '';
        position: relative;
        width: 50%;
        height: 100%;
        background-color: #007bff; /* Default blue background */
        border-radius: 30px;
        transition: transform 0.3s ease, background-color 0.3s ease;
        transform: translateX(0);
    }

    .slider.active::before {
        transform: translateX(50%);
        background-color: #28a745; /* Green background for active state */
    }

    .flag {
        font-size: 24px; /* Adjust size as needed */
        color: #333; /* Dark text color for better readability */
        position: absolute;
        width: 50%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.3s ease;
    }

    .flag img {
        width: 30px; /* Adjust size as needed */
        height: auto;
        margin-right: 8px;
    }

    .flag.active {
        opacity: 1;
    }

    .flag.inactive {
        opacity: 0;
    }

    .flag:nth-child(1) {
        left: 0;
        background-color: #f8d7da; /* Light red background for inactive Burmese */
        border-radius: 30px 0 0 30px;
    }

    .flag:nth-child(2) {
        right: 0;
        background-color: #d4edda; /* Light green background for active English */
        border-radius: 0 30px 30px 0;
    }
    </style>
</head>
<body>
  <div class="slider-container">
        <div class="slider" id="slider">
            <div id="myanmar" class="flag inactive">
                🇲🇲 Myanmar
            </div>
            <div id="english" class="flag active">
                🇬🇧 English
            </div>
        </div>
    </div>

    <div class="menus_tab" id="menus_tab">
        <!-- Categories and menus will be injected here by JavaScript -->
    </div>

    <script>	
        function updateContent(language) {
            const menusTab = document.getElementById('menus_tab');
            menusTab.innerHTML = '';

            const categoriesList = categories[language];
            categoriesList.forEach(category => {
                const categoryDiv = document.createElement('div');
                categoryDiv.className = 'menu_item tab_category_content';
                categoryDiv.id = category.id;
                categoryDiv.style.display = 'block';

                const menuItems = menus[language][category.id];
                menuItems.forEach(menu => {
                    const menuItem = document.createElement('div');
                    menuItem.textContent = menu.name;
                    categoryDiv.appendChild(menuItem);
                });

                menusTab.appendChild(categoryDiv);
            });
        }

        // Handle slider click to switch languages
        document.getElementById('slider').addEventListener('click', function() {
            const slider = document.getElementById('slider');
            const flagMyanmar = document.getElementById('myanmar');
            const flagEnglish = document.getElementById('english');
            let isSliderActive = slider.classList.contains('active');

            const language = isSliderActive ? 'my' : 'en'; // 'my' for Burmese, 'en' for English

            // Update the slider state
            slider.classList.toggle('active');
            flagMyanmar.classList.toggle('inactive');
            flagEnglish.classList.toggle('inactive');

            // Update content based on selected language
            updateContent(language);
        });

        // Set initial content based on default language (English)
        document.addEventListener('DOMContentLoaded', () => {
            updateContent('en'); // Default to English
        });
    </script>
</body>
</html>




        <div class="menus_tabs">
            <div class="menus_tabs_picker">
                <ul style="text-align: center;margin-bottom: 70px">
                    <?php
                        $stmt = $con->prepare("Select * from menu_categories");
                        $stmt->execute();
                        $rows = $stmt->fetchAll();
                        $count = $stmt->rowCount();

                        $x = 0;
                        foreach($rows as $row) {
                            if($x == 0) {
                                echo "<li class='menu_category_name tab_category_links active_category' onclick=showCategoryMenus(event,'".str_replace(' ', '', $row['category_name'])."')>";
                                echo $row['category_name'];
                                echo "</li>";
                            } else {
                                echo "<li class='menu_category_name tab_category_links' onclick=showCategoryMenus(event,'".str_replace(' ', '', $row['category_name'])."')>";
                                echo $row['category_name'];
                                echo "</li>";
                            }
                            $x++;
                        }
                    ?>
                </ul>
            </div>

            <div class="menus_tab">
                <?php
                    $stmt = $con->prepare("Select * from menu_categories");
                    $stmt->execute();
                    $rows = $stmt->fetchAll();
                    $count = $stmt->rowCount();

                    $i = 0;
                    $search_query = isset($_GET['search']) ? $_GET['search'] : '';

                    foreach($rows as $row) {
                        if($i == 0) {
                            echo '<div class="menu_item tab_category_content" id="'.str_replace(' ', '', $row['category_name']).'" style="display:block">';

                            $stmt_menus = $con->prepare("Select * from menus where category_id = ? AND (menu_name LIKE ? OR menu_description LIKE ?)");
                            $stmt_menus->execute(array($row['category_id'], "%$search_query%", "%$search_query%"));
                            $rows_menus = $stmt_menus->fetchAll();

                            if($stmt_menus->rowCount() == 0) {
                                echo "<div style='margin:auto'>No Available Menus for this category!</div>";
                            }

                            echo "<div class='row'>";
                            foreach($rows_menus as $menu) {
                                ?>
                                <div class="col-md-4 col-lg-3 menu-column">
                                    <div class="thumbnail" style="cursor:pointer">
                                        <?php $source = "admin/Uploads/images/".$menu['menu_image']; ?>

                                        <div class="menu-image">
                                            <div class="image-preview">
                                                <div style="background-image: url('<?php echo $source; ?>');"></div>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <h5><?php echo $menu['menu_name'];?></h5>
                                            <p><?php echo $menu['menu_description']; ?></p>
                                            <span class="menu_price"><?php echo number_format($menu['menu_price'], 0); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            echo "</div>";
                            echo '</div>';
                        } else {
                            echo '<div class="menus_categories tab_category_content" id="'.str_replace(' ', '', $row['category_name']).'">';

                            $stmt_menus = $con->prepare("Select * from menus where category_id = ? AND (menu_name LIKE ? OR menu_description LIKE ?)");
                            $stmt_menus->execute(array($row['category_id'], "%$search_query%", "%$search_query%"));
                            $rows_menus = $stmt_menus->fetchAll();

                            if($stmt_menus->rowCount() == 0) {
                                echo "<div class = 'no_menus_div'>No Available Menus for this category!</div>";
                            }

                            echo "<div class='row'>";
                            foreach($rows_menus as $menu) {
                                ?>
                                <div class="col-md-4 col-lg-3 menu-column">
                                    <div class="thumbnail" style="cursor:pointer">
                                        <div class="caption">
                                            <h5><?php echo $menu['menu_name'];?></h5>
                                            <p><?php echo $menu['menu_description']; ?></p>
                                            <span class="menu_price"><?php echo number_format($menu['menu_price'], 0); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            echo "</div>";
                            echo '</div>';
                        }
                        $i++;
                    }
                    echo "</div>";
                ?>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT US SECTION -->

	<section class="contact-section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 sm-padding">
                    <div class="contact-info">
                        <h2>
                           <p style="font-family: 'Bookman Old Style', serif; color: white; font-size: 29px;">To order food, please dial 
						   reception number <span class="phone-number">'0'</span>.</p>
                        </h2>
						<br>
						<br>
                        <p style="font-family: 'Bookman Old Style', serif; color: cornsilk; font-size: 18px;">
    Food order မှာယူလိုပါက reception number <span class="phone-num">'0'</span> သို့ဆက်သွယ်မှာယူနိုင်ပါသည်။  အစားအသောက်အမှာများကို ည၈နာရီခွဲနှောက်ဆုံးထားမှာကြားနိုင်သည်။ အ‌အေး၊ ဘီယာ၊ ခေါက်ဆွဲဘူးအမှာများကို ည၁၀နာရီထိ အခန်းရောက်ပို့ဆောင်ပေးပါသည်။ ည၁၀နာရီနောက်ပိုင်းတွင် ဧည့်သည်တော်များ reception ကောင်တာတွင် လာရောက်၀ယ်ယူနိုင်ပါသည်။
</p>
                    </div>
                </div>

    </section>

	<!-- WIDGET SECTION / FOOTER -->

    <section class="widget_section" id="about" style="background-color: #222227;padding: 100px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <img src="Design/images/log.png" alt="Restaurant Logo" style="width: 150px;margin-bottom: 20px;">
                        <p>
                           23Hotel offers a unique blend of luxury and comfort, providing guests with an unforgettable experience from the moment they step through our doors. Nestled in a vibrant cityscape, our hotel boasts modern amenities to meet the needs of every traveler.
                        </p>
                        <ul class="widget_social">
                            <li><a href="https://www.facebook.com/23Hotel.Residence?mibextid=JRoKGi" target="_blank" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook-f fa-2x"></i></a></li>
                           <li><a href="https://www.instagram.com/23hotelyangon?igsh=MzRlODBiNWFlZA==" target="_blank" data-toggle="tooltip" title="Instagram"><i class="fab fa-instagram fa-2x"></i></a></li>>
							<li><a href="https://www.23hotelyangon.com" target="_blank" data-toggle="tooltip" title="23 Hotel Yangon Website"><i class="fab fa-google-plus-g fa-2x"></i></a></li>
                             <li><a href="https://maps.app.goo.gl/gB2FfyFHT44GioBg7?g_st=ic" target="_blank" data-toggle="tooltip" title="Google Maps"><i class="fas fa-map-marker-alt fa-2x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                     <div class="footer_widget">
                       						<p style="font-family: 'Edwardian Script ITC', cursive, sans-serif; color: cyan; font-size: 30px;">For Enquiries:</p>
                        <p>
                            <?php echo $restaurant_email; ?>
                            <br>
                            <?php echo $restaurant_phonenumber; ?>, 095008879   
                        </p>
                     </div>
                </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <h3>Subscribe to our contents</h3>
                        <div class="subscribe_form">
                            <form action="#" class="subscribe_form" novalidate="true">
                                <input type="email" name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address...">
                                <button type="submit" class="submit">SUBSCRIBE</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER BOTTOM  -->

    <?php include "Includes/templates/footer.php"; ?>

    <script type="text/javascript">

	    $(document).ready(function()
	    {
	        $('#contact_send').click(function()
	        {
	            var contact_name = $('#contact_name').val();
	            var contact_email = $('#contact_email').val();
	            var contact_subject = $('#contact_subject').val();
	            var contact_message = $('#contact_message').val();

	            var flag = 0;

	            if($.trim(contact_name) == "")
	            {
	            	$('#invalid-name').text('This is a required field!');
	            	flag = 1;
	            }
	            else
	            {
	            	if(contact_name.length < 5)
	            	{
	            		$('#invalid-name').text('Length is less than 5 letters!');
	            		flag = 1;
	            	}
	            }

	            if(!ValidateEmail(contact_email))
	            {
	            	$('#invalid-email').text('Invalid e-mail!');
	            	flag = 1;
	            }

	            if($.trim(contact_subject) == "")
	            {
	            	$('#invalid-subject').text('This is a required field!');
	            	flag = 1;
	            }

	            if($.trim(contact_message) == "")
	            {
	            	$('#invalid-message').text('This is a required field!');
	            	flag = 1;
	            }

	            if(flag == 0)
	            {
	            	$('#sending_load').show();

		            $.ajax({
		                url: "Includes/php-files-ajax/contact.php",
		                type: "POST",
		                data:{contact_name:contact_name, contact_email:contact_email, contact_subject:contact_subject, contact_message:contact_message},
		                success: function (data) 
		                {
		                	$('#contact_status_message').html(data);
		                },
		                beforeSend: function()
		                {
					        $('#sending_load').show();
					    },
					    complete: function()
					    {
					        $('#sending_load').hide();
					    },
		                error: function(xhr, status, error) 
		                {
		                    alert("Internal ERROR has occured, please, try later!");
		                }
		            });
	            }
	            
	        });
	    }); 
	    
	</script> 