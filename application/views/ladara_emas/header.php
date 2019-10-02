<?php $path = $this->general->path(); ?>
<?php $urlapi = $this->general->apiurl(); ?>
<?php $setting = $this->general->setting(); ?>

<?php if(!$this->session->userdata('id_login') == '') { ?>
	<?php $getbadge = $this->general->getbadge(); ?>
	<?php $point = $this->general->point(); ?>
	<?php $saldo = $this->general->saldo(); ?>
<?php } ?>

<?php
		$this->load->model('users_model');
		$this->load->helper(array('Form', 'Cookie', 'String'));

		//get cookie visitor
		$visitor = get_cookie('ionvst');
		//jika cookie visitor maka buat cookie baru
		if($visitor == '') {
			$randomdata = random_string('num', 20);
			$datexpired = date("dmyHis");
			$keyvst = $randomdata.$datexpired;

	        set_cookie('ionvst', $keyvst, 3600*24*30, '', '/', '', 'TRUE', 'TRUE'); // set
		}

		//get cookie and session login user
		$cookie = get_cookie('ionaccess');
		//jika cookie ada dan session kosong maka akan d buat sesion baru
		if($this->session->userdata('id') == '' AND $cookie <> '') {
            // cek cookie
             $where_array = array(
               'cookie'=>$cookie
              );
			$query = $this->db->get_where('user_cookies',$where_array);
            if($query->num_rows() == 1) {
            	$getuser 	= $this->db->query('SELECT id_user, cookie FROM user_cookies where cookie = "'.$cookie.'"');
				$datauser 	= $getuser->row();

                $row 	= $this->db->query('SELECT id, status, full_name, aktif, kota_nama, code_user,email FROM users where id = "'.$datauser->id_user.'"');
				$admin 	= $row->row();
				$id 	= $admin->id;
				$email 	= $admin->email;
				$status = $admin->status;
				$code_user = $admin->code_user;
				$full_name 	= $admin->full_name;
				$kota_nama 	= $admin->kota_nama;

				$this->session->set_userdata('email', $email);
				$this->session->set_userdata('status', $status);
				$this->session->set_userdata('full_name', $full_name);
				$this->session->set_userdata('code_user', $code_user);
				$this->session->set_userdata('id_login', uniqid(rand()));
				$this->session->set_userdata('id', $id);
            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="canonical" href="https://digital.ladaraindonesia.com/"/>
	<meta name="robots" content="index, follow" />
	<title> <?php echo $title ?> </title>
	<meta name="description" content="<?php echo $description ?>">
	<link rel="icon" href="/assets/images/favicon.png" type="image/gif">
	<!--<link rel="icon" href="<?php echo $path.'setting_img/ionmercantileicon.png'?>"-->
	<!--
	Developed by Imam Abdurahman
	email : abdurrahman.imam19@gmail.com / imamabd@mindweb.co.id
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/chosen.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/flaticon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/easyzoom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/Pe-icon-7-stroke.css">
	<link href='https://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,300italic,300,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/f69a38.css">

	<style>

		/* Style the tab */
		.tab {
		  overflow: hidden;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
		  background-color: #ddd;
		}

		/* Create an active/current tablink class */
		.tab button.active {
		  background-color: #ceb675;
		}

		/* Style the tab content */
		.tabcontent {
		  display: none;
		  padding: 6px 12px;
		  border: 1px solid #ccc;
		  border-top: none;
		}

		/* Style the close button */
		.topright {
		  float: right;
		  cursor: pointer;
		  font-size: 28px;
		}

		.topright:hover {color: red;}

		#exTab2 h3 {
color : white;
background-color: #428bca;
padding : 5px 15px;
}

.wrapper {
  display: block;
  margin: 5em auto;
  border: 1px solid #555;
  width: 700px;
  height: 350px;
  position: relative;
}


.panel-default >.panel-heading {
   text-transform: none;
   font-weight: 600;
	 box-shadow:rgba(136, 136, 136, 0.37) 0px 5px;
	 border-radius: 10px;
}
.nav-tabs {
   border-bottom: none;
}
.nav-tabs>li.active>a {
      &:after {
       position: absolute;
       content: " ";
       width: 12px;
       height: 12px;
       border-radius: 3px 0 0 0;
       -webkit-transform: rotate(45deg);
       -ms-transform: rotate(45deg);
       transform: rotate(45deg);
       box-shadow: none;
       bottom: -60%;
       right: 50%;
    }
}
.nav-tabs>li>a {
   color: #888888;
   border: 1px solid transparent;
   border-right: 2px solid white;
   border-radius: 0px;
   padding: 3px 20px;
   &:hover {
      background-color: transparent;
      border: 1px solid transparent;
   }
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
   color: #337ab7;
   cursor: pointer;
   background-color: transparent;
   border: 1px solid transparent;
   border-right: 2px solid #888888;
}

ul.asset-list {
    margin: 20px 0px 0px 0px;
    padding: 0;
    position: relative;
    display: inline-block;
    li.photo {
        list-style: none;
        box-shadow: 0 0 1px #00a6e1;
        display: inline-block;
        margin: 10px;
        cursor: pointer;
        .asset-loading {
            width: 170px;
            position: relative;
            text-align: center;
           img {
              max-width: 170px;
           }
        }
        .cta-delete {
            position: absolute;
            z-index: 100;
            top: 5px;
            right: 5px;
            color: white;
            cursor: pointer;
            i {
                font-size: 20px;
            }
           &.video {
              top: 35%;
              left: 35%;
              color: #e40046;
              opacity: 0.7;
              height: 35px;
              width: 35px;
              border: 2px solid transparent;
              border-radius: 50%;
              padding-top: 5px;
              padding-left: 5px;
              background-color: #e40046;
              i {
                 font-size: 20px;
                 color: white;
              }
           }
        }
    }
}
.btn.flat {
    border: none;
    color: white;
    text-shadow: none;
    border-radius: 0px;
    min-width: 160px;
}

.btn.flat.btn-default {
    background: #38a9de;
    padding: 12px 50px;
    text-transform: uppercase;
    font-weight: bold;
}

.btn.flat.btn-submit {
    background: #e40046;
    padding: 12px 50px;
    text-transform: uppercase;
    font-weight: bold;
}

.btn.flat.btn-create {
    background: #e40046;
    padding: 12px 50px;
    text-transform: uppercase;
    font-weight: bold;
}

.btn-small {
    padding: 12px 30px !important;
}

.btn.flat.btn-chat-submit,
.btn.flat.btn-pitch-chat-submit {
    background: #E40046;
    padding: 8px 20px;
    text-transform: uppercase;
    font-weight: bold;
    min-width: 50px;
}

.btn.Previous {
    background: #eee !important;
    color: #333 !important;
    border: solid 1px #aaa;
}

.btn.Next {
    width: 130px;
    border-radius: 0px !important;
}

.btn-Upload-group {
    margin: 10px auto;
    padding: 5px;
}

.btn.flat.Upload {
    background: white;
    border: solid 1px #E40046;
    color: #E40046;
    font-size: 13px;
    margin-left: 10px;
}
.actions {
   margin: 50px 10px;
}
// Dropdown
ul.nav {
  list-style: none;
   li {
      display: inline-block;
      //Notifications
      &.message-nav {
         float: right;
         margin-right: 20px;
         a {
            color: black;
            background-color: white;
            &:hover, &.open, &.focus, &.active{
               cursor: pointer;
               color: #e40046;
               background-color: white;
            }
         }
         i {
            font-size: 20px;
         }
      }
      //Filter Sort
      &.filter-sort {
         float: right;
         margin-right: 20px;
         a {
            font-size: 18px;
            color: black;
            background-color: white;
            &:hover, &.open, &.focus, &.active{
               cursor: pointer;
               color: #e40046;
               background-color: white;
               text-decoration: none;
            }
         }
      }
   }
}
.dropdown-menu {
    padding: 0;
    margin: 0;
    background: white;
    min-width: 200px;
    width: 370px;
    position: absolute;
    top: 50px;
    display: none;
    z-index: 100;
    border-radius: 0px;
    &.sorting {
       width: 250px;
    }
    &:before {
       position: absolute;
       content: "";
       background: #fff;
       width: 12px;
       height: 12px;
       border-radius: 3px 0 0 0;
       -webkit-transform: rotate(45deg);
       -ms-transform: rotate(45deg);
       transform: rotate(45deg);
       box-shadow: -1px -1px 1px rgba(2,2,4,0.2);
       top: -6px;
       right: 12px;
    }
    li {
      width: 100%;
      &.notification-title {
         text-transform: uppercase;
         color: black;
         font-weight: 500;
         font-size: 18px;
         padding: 5px 20px;
         margin: 5px auto 5px;
      }
      &.notification-footer {
         text-transform: uppercase;
         color: black;
         font-weight: 500;
         font-size: 18px;
         padding: 5px 20px;
         margin: -5px auto 5px;
         border-top: solid 1px rgba(151,151,151,.8);
         a:hover {text-decoration:none;}
      }
   }
    ul.notification-list {
       li.notification-item {
          padding: 5px 25px;
          margin-left: -35px;
          margin-right: 0px;
          width: 360px;
          border-top: solid 1px rgba(151,151,151,.8);
         }
         a.notification-anchor {
            display: block;
            clear: both;
            &:hover {
               text-decoration: none;
            }
         }
        .notification-anchor {
           span.notification-img {
              float: left;
              margin-right: 10px;
              height: 80px;
              padding-top: 5px;
              img {
                 border-radius: 50%;
                 width: 60px;
                 height: 60px;
              }
           }
           p {
              margin-bottom: 0px;
              color: #8D8D8D;
              font-size: 14px;
              &.notification-type {
                 font-size: 16px;
                 color: #E63A45;
              }
              &.notification-project {
                 font-style: italic;
              }
           }
        }
      }
    ul.filter-sort-list {
       padding: 10px;
       li {
          padding: 5px;

       }
    }
}

.skill-zone {
   .label {
      margin-right: 5px;
   }
}

		</style>


<style>

.demo {
padding: 30px;
min-height: 280px;
}

.tab-content{
padding: 10px;
}

@nav-link-hover-bg: #eeeeee;
@nav-tabs-border-color: #dddddd;
@border-radius-base: 5px;
@screen-xs-max: 767px;


//css to add hamburger and create dropdown
.nav-tabs.nav-tabs-dropdown,
.nav-tabs-dropdown {
@media (max-width: @screen-xs-max) {
		border: 1px solid @nav-tabs-border-color;
		border-radius: @border-radius-base;
		overflow: hidden;
		position: relative;

		&::after {
			content: "☰";
			position: absolute;
			top: 8px;
			right: 15px;
			z-index: 2;
			pointer-events: none;
		}

		&.open {
			a {
				position: relative;
				display: block;
			}

			> li.active > a {
				background-color: @nav-link-hover-bg;
			}
		}


	li {
		display: block;
		padding: 0;
		vertical-align: bottom;
	}

	> li > a {
		position: absolute;
		top: 0;
		left: 0;
		margin: 0;
		width: 100%;
		height: 100%;
		display: inline-block;
		border-color: transparent;

		&:focus,
		&:hover,
		&:active {
			border-color: transparent;
		}
	}

	> li.active > a {
		display:block;
		border-color: transparent;
		position: relative;
		z-index: 1;
		background: #fff;

		&:focus,
		&:hover,
		&:active {
			border-color: transparent;
		}

	}
}
}

</style>


	<script type="application/ld+json">
	{
	    "@context": "http://schema.org",
	    "@type": "Organization",
	    "name": "LaDara",
	    "url": "https://digital.ladaraindonesia.com/",
	     "logo": "https://digital.ladaraindonesia.com/",
	    "contactPoint": [
	        {
	            "@type": "ContactPoint",
	            "telephone": "(021) 223320009",  <!--+62129544307-->
	            "contactType": "Customer Care",
	            "availableLanguage": ["Bahasa", "English"]
	        }
	    ],
	    "sameAs": [
	        "https://www.facebook.com/LadaraIndonesia/",
	        "https://twitter.com/LadaraIndonesia",
	        "https://api.whatsapp.com/send?phone=681218911102",
	        "https://www.instagram.com/ladara.co/",
	    ]
	}
	</script>

	<script type="application/ld+json">
	{
	    "@context": "http://schema.org",
	    "@type": "WebSite",
	    "url": "https://digital.ladaraindonesia.com/",
	    "name": "LaDaRa Indonesia",
	    "alternateName": "LaDaRa Indonesia : Toko Online pulsa, paket data, tagihan pln, voucher pln, pdam, multifinance, tv kabel, voucher game, tagihan prabayar",
	    "potentialAction": {
	        "@type": "SearchAction",
	        "target": "https://ionmercantile.com/catalog?q={search_term_string}",
	        "query-input": "required name=search_term_string"
	    }
	}
	</script>

		<meta name="keywords" content="LaDaRa, digital, pulsa, paket data, tagihan pln, voucher pln, pdam, multifinance, tv kabel, voucher game, tagihan prabayar"/>

        <meta property="og:title" content="LaDaRa Indonesia: Toko Online pulsa, paket data, tagihan pln, voucher pln, pdam, multifinance, tv kabel, voucher game, tagihan prabayar"/>
        <meta property="og:url" content="https://digital.ladaraindonesia.com/"/>
        <meta property="og:description" content="Ladara Indonesia: Toko Online pulsa, paket data, tagihan pln, voucher pln, pdam, multifinance, tv kabel, voucher game, tagihan prabayar"/>
        <meta property="og:image" content="https://officer.ladaraindonesia.com/setting_img/animasiladaraloopcropperkecil70.gif"/>
        <meta property="og:image:secure_url" content="https://officer.ladaraindonesia.com/setting_img/animasiladaraloopcropperkecil70.gif"/>
        <meta property="og:title" content="LaDaRa Indonesia  Toko Online pulsa, paket data, tagihan pln, voucher pln, pdam, multifinance, tv kabel, voucher game, tagihan prabayar"/>
        <meta property="og:site_name" content="LaDaRa Indonesia"/>
        <meta property="og:type" content="website"/>

        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:site" content="@LadaraIndonesia"/>
        <meta name="twitter:creator" content="@LadaraIndonesia"/>
        <meta name="twitter:title" content="LaDaRa Indonesia: Toko Online pulsa, paket data, tagihan pln, voucher pln, pdam, multifinance, tv kabel, voucher game, tagihan prabayar"/>
        <meta name="twitter:description" content="LaDaRa Indonesia : pulsa, paket data, tagihan pln, voucher pln, pdam, multifinance, tv kabel, voucher game, tagihan prabayar"/>
        <meta name="twitter:image:src" content="https://officer.ladaraindonesia.com/setting_img/animasiladaraloopcropperkecil70.gif"/>
        <meta name="twitter:url" content="https://ladaraindonesia.com/"/>

				<style>

.nav>li>a:hover{
	text-decoration: none;
background-color: #337ab766;
border-radius: 10px;
}





				.dropbtn {
  color: #337ab7;
  padding: 30px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
	font-size:12px;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #888888;}

img{
  max-width:180px;
}
input[type=file]{
padding:10px;
}

.sidebar{
	display: inherit;
}

@media screen and (max-width: 600px) {
  .sidebar {
    display:  none;
  }
	.menutop{
		display: inherit;
		padding-left: 10px;
	}
	.menudropdown{
		position: initial;
	}

}
@media screen and (min-width: 600px) {
  .menutop {
    display:  none;
  }
	.navmenuku{
		height: 7%;
	}
}

				</style>
				<script src="https://unpkg.com/js-offcanvas@1.2.8/dist/_js/js-offcanvas.pkgd.min.js"></script>
				<link href="https://unpkg.com/js-offcanvas@1.2.8/dist/_css/prefixed/js-offcanvas.css" rel="stylesheet">
</head>
<body class="">

	<nav class="navbar navbar-fixed-top navbar-inverse navmenuku" style="background-color:#eee;border-color:#eee;">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
	            <?php
	              $start = 0;
	              foreach ($setting as $setting)
	              {
	              $imglogo = "$path/setting_img/copyright.png";
	            ?>

	              <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets') ?>/images/emas/logo.png" alt="<?php echo $setting->nama_web; ?>"></a>
	            <?php } ?>
	      </a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<div class="dropdown" style="top:5px;">
					 <div id="loading-ct" class="loading-ct">  Halo!  Siapa? <span class="glyphicon glyphicon-user" aria-hidden="true" style="padding:15px;"></span></div>
						<div class="dropdown-content menudropdown" align="center" style="right:50px;">
							<a href="#">Saldo</a>
							<a href="<?php echo base_url('register') ?>">Register</a>
						</div>
						<a class="menutop" href="https://ladaraindonesia.com"> LadaraIndonesia.com</a><br>
						<a class="menutop" href="#">Profil</a><br>
						<a class="menutop" href="#"> Investasi Lainnya</a><br>
						<a class="menutop" href="#">Transaksi Emas</a><br>
						<a class="menutop" href="#">Riwayat Transaksi</a>
					</div>
				</ul>
			</div>
		</div>
	</nav>
