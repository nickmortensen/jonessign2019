<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wprig
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php if ( ! wprig_is_amp() ) : ?>
		<script>document.documentElement.classList.remove("no-js");</script>
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">





	<header class="globalNav noDropdownTransition">


		<div class="container-lg">
			<ul class="navRoot">


				<li class="navSection logo">
					<a class="rootLink item-home colorize" href="/">
						<h1>Jones Sign</h1>
					</a>
				</li>

				<li class="navSection primary">
					<a class="rootLink item-products hasDropdown colorize" data-dropdown="products">
					Products
					</a>
					<a class="rootLink item-offerings hasDropdown colorize" data-dropdown="offerings">
					Offerings
					</a>
					<a class="rootLink item-company hasDropdown colorize" data-dropdown="company">
					Company
					</a>
				</li>

				<li class="navSection secondary">
					<a class="rootLink item-support colorize" href="https://support.stripe.com">
					Support
					</a>
					<a class="rootLink item-dashboard colorize" data-adroll-segment="submit_two" href="https://dashboard.stripe.com/login">
					Sign in
					</a>
				</li>



				<li class="navSection mobile">
					<a class="rootLink item-mobileMenu colorize"><h2>Menu</h2></a>
					<div class="popup">
					<div class="popupContainer">
						<a class="popupCloseButton">Close</a>
						<div class="mobileProducts">
						<h4>Products</h4>
						<div class="mobileProductsList">
							<ul>
								<li>
									<a class="linkContainer item-payments" href="https://stripe.com/features">
										<svg viewBox="0 0 48 48">
										<path fill="#87BBFD" class="hover-fillLight" d="M24 48C12.11 48 2.244 39.35.338 28H6.5V9H5.27C9.67 3.515 16.423 0 24 0c13.255 0 24 10.745 24 24S37.255 48 24 48z"></path><path fill="#555ABF" class="hover-fillDark" d="M25 21v8H.526A24.082 24.082 0 0 1 0 24 23.908 23.908 0 0 1 6.116 8H31.5c.828 0 1.5.67 1.5 1.5V21h-8zm-10.502-8.995a6.497 6.497 0 1 0 0 12.994 6.497 6.497 0 0 0 0-12.996z"></path><path fill="#FFF" d="M39.823 39.276a2.44 2.44 0 0 1-1.76.724H16.5a1.5 1.5 0 0 1-1.5-1.5v-18c0-.828.67-1.5 1.5-1.5h27.693a1.51 1.51 0 0 1 1.484 1.256c.21 1.217.323 2.467.323 3.744 0 5.936-2.355 11.32-6.177 15.276zM33.5 23.002a6.497 6.497 0 1 0 0 12.995 6.497 6.497 0 0 0 .002-12.994z"></path></svg>services
									</a>
								</li>
								<li>
									<a class="linkContainer item-subscriptions" href="https://stripe.com/subscriptions">
										<svg viewBox="0 0 48 48"><path fill="#74E4A2" class="hover-fillLight" d="M24 0c13.255 0 24 10.745 24 24S37.255 48 24 48 0 37.255 0 24 10.745 0 24 0z"></path><path fill="#FFF" d="M39.558 30.977c-6.23 6.225-16.304 6.194-22.535-.03l13.975-13.962c-6.232-6.224-16.335-6.224-22.567 0-4.043 4.04-5.456 9.712-4.247 14.896l-.654.174a21.89 21.89 0 0 1-1.536-8.61c.284-11.806 10.003-21.35 21.823-21.446 6.15-.05 11.72 2.42 15.744 6.438 6.23 6.226 6.23 16.318 0 22.542z"></path><path fill="#159570" class="hover-fillDark" d="M33.653 21.413c1.43 5.336-1.735 10.82-7.068 12.25-5.332 1.43-10.814-1.736-12.242-7.072-1.43-5.334 1.735-10.82 7.068-12.25 5.334-1.43 10.815 1.738 12.244 7.074z"></path></svg>work
									</a>
								</li>
								<li>
									<a class="linkContainer item-connect" href="https://stripe.com/connect">
										<svg viewBox="0 0 48 48"><path fill="#68D4F8" class="hover-fillLight" d="M48 24c0 13.255-10.745 24-24 24S0 37.255 0 24 10.745 0 24 0c1.363 0 2.698.12 4 .338V15h5v5h14.662c.218 1.302.338 2.637.338 4z"></path><path fill="#FFF" d="M16.99 29.966L17 17l-5.55-.006a1.02 1.02 0 0 0-.725.3L2.65 25.446a1.55 1.55 0 0 0-.44 1.28c1.22 9.944 9.1 17.825 19.042 19.047.472.058.945-.104 1.28-.44l8.172-8.076c.192-.193.3-.453.3-.725L31 31l-12.985-.01a1.023 1.023 0 0 1-1.024-1.024z"></path><path fill="#217AB7" class="hover-fillDark" d="M47.697 20.195L37.194 30.702a1.03 1.03 0 0 1-.726.3h-5.462V18.03c0-.567-.46-1.025-1.025-1.025H16.994V11.52c0-.274.108-.534.3-.726L27.783.3C38 1.916 46.07 9.98 47.698 20.194z"></path></svg>expertise
									</a>
								</li>
							</ul>

							<ul>
								<li>
									<a class="linkContainer item-relay" href="https://stripe.com/relay">
										<svg viewBox="0 0 48 48"><path fill="#FFA27B" class="hover-fillLight" d="M24 0c13.255 0 24 10.745 24 24S37.255 48 24 48 0 37.255 0 24 10.745 0 24 0z"></path><path fill="#C23D4B" class="hover-fillDark" d="M24 12.5c8.285 0 15 6.828 15 15.25S32.285 43 24 43c-8.284 0-15-6.828-15-15.25S15.716 12.5 24 12.5z"></path><path fill="#FFF" d="M25 38.925v6.288a.787.787 0 0 1-.788.787h-.424a.787.787 0 0 1-.788-.788v-6.287c-3.668-.49-6.5-3.623-6.5-7.425a7.5 7.5 0 0 1 15 0c0 3.802-2.832 6.935-6.5 7.425z"></path></svg>about
									</a>
								</li>
								<li>
									<a class="linkContainer item-atlas" href="https://stripe.com/atlas">
										<svg viewBox="0 0 48 48"><path fill="#FCD669" class="hover-fillLight" d="M24 0c13.255 0 24 10.745 24 24S37.255 48 24 48 0 37.255 0 24 10.745 0 24 0z"></path><path fill="#CE7C3A" class="hover-fillDark" d="M24.012 1.834c.366.005.73.196.92.575l16.825 33.72c.396.79-.314 1.685-1.175 1.48L24 33.626V1.834h.01z"></path><path fill="#FFF" d="M24 1.834v31.794l-16.584 3.98A1.043 1.043 0 0 1 6.24 36.13L23.067 2.41c.195-.39.572-.58.947-.576H24z"></path></svg>news
									</a>
								</li>
								<li>
									<a class="linkContainer item-radar" href="https://stripe.com/radar">
										<svg viewBox="0 0 48 48"><path class="hover-fillLight" fill="#F6A4EB" d="M41.364 21.886h6.538c.06.697.098 1.4.098 2.114 0 13.255-10.745 24-24 24S0 37.255 0 24 10.745 0 24 0c6.833 0 12.993 2.86 17.364 7.442v14.444z"></path><path fill="#FFF" d="M37.746 37.4a1.3 1.3 0 0 1 .92-.38c.72 0 1.303.444 1.303 1.163 0 .503-.353.982-.708 1.292-3.484 3.122-8.325 5.53-13.783 5.53-11.75 0-19.486-9.538-19.486-18.83 0-8.72 7.195-16.19 15.25-16.19s11.227 5.54 11.227 5.54L37.747 37.4z"></path><path class="hover-fillDark" fill="#9251AC" d="M47.995 24zm0 0c0-.995-.807-1.974-1.802-1.974-1.15 0-1.8.94-1.8 1.83-.09 3.174-1.228 7.127-3.453 10.182-2.355 3.232-6.91 6.956-13.242 6.956-7.625 0-13.213-5.767-13.213-11.925 0-4.3 2.886-7.17 5.828-7.17 1.588 0 2.48.683 2.965 1.312.362.468 1.063.493 1.482.074L40.968 7.032A23.926 23.926 0 0 1 47.995 24z"></path></svg>location
										<span class="new-badge">New</span>
									</a>
								</li>
							</ul>
						</div>
						</div>
						<div class="mobileSecondaryNav">
						<ul>
							<li>
							<a class="item-pricing" href="https://stripe.com/pricing" data-analytics-action="pricing" data-action-source="mobile-nav">
								Pricing
							</a>
							</li>
							<li><a class="item-workswith" href="https://stripe.com/works-with">Works with Stripe</a></li>
							<li><a class="item-gallery" href="https://stripe.com/customers">Customers</a></li>
							<li><a class="item-documentation" href="https://stripe.com/docs">Documentation</a></li>
						</ul>
						<ul>
							<li><a class="item-about" href="https://stripe.com/about">About Stripe</a></li>
							<li><a class="item-jobs" href="https://stripe.com/jobs">Jobs</a></li>
							<li><a class="item-blog" href="https://stripe.com/blog">Blog</a></li>
						</ul>
						</div>
						<a class="mobileSignIn" data-adroll-segment="submit_two" href="https://dashboard.stripe.com/login">Sign in</a>
					</div>
					</div>
				</li>


			</ul>
		</div>



		<div class="dropdownRoot">
			<div class="dropdownBackground" style="transform: translateX(452px) scaleX(0.707692) scaleY(1.1075);">
			<div class="alternateBackground" style="transform: translateY(255.53px);"></div>
			</div>
			<div class="dropdownArrow" style="transform: translateX(636px) rotate(45deg);"></div>
			<div class="dropdownContainer" style="transform: translateX(452px); width: 368px; height: 443px;">

			<div class="dropdownSection left" data-dropdown="products">
				<div class="dropdownContent">

				<div class="linkGroup">
					<ul class="productsGroup">
					<li><a class="linkContainer item-payments" href="https://stripe.com/payments">
						<svg viewBox="0 0 48 48"><path fill="#87BBFD" class="hover-fillLight" d="M24 48C12.11 48 2.244 39.35.338 28H6.5V9H5.27C9.67 3.515 16.423 0 24 0c13.255 0 24 10.745 24 24S37.255 48 24 48z"></path><path fill="#555ABF" class="hover-fillDark" d="M25 21v8H.526A24.082 24.082 0 0 1 0 24 23.908 23.908 0 0 1 6.116 8H31.5c.828 0 1.5.67 1.5 1.5V21h-8zm-10.502-8.995a6.497 6.497 0 1 0 0 12.994 6.497 6.497 0 0 0 0-12.996z"></path><path fill="#FFF" d="M39.823 39.276a2.44 2.44 0 0 1-1.76.724H16.5a1.5 1.5 0 0 1-1.5-1.5v-18c0-.828.67-1.5 1.5-1.5h27.693a1.51 1.51 0 0 1 1.484 1.256c.21 1.217.323 2.467.323 3.744 0 5.936-2.355 11.32-6.177 15.276zM33.5 23.002a6.497 6.497 0 1 0 0 12.995 6.497 6.497 0 0 0 .002-12.994z"></path></svg>
						<div class="productLinkContent">
						<h3 class="linkTitle">Payments</h3>
						<p class="linkSub">A complete commerce toolkit, built for&nbsp;offerings.</p>
						</div>
					</a></li>
					<li><a class="linkContainer item-subscriptions" href="https://stripe.com/subscriptions">
						<svg viewBox="0 0 48 48"><path fill="#74E4A2" class="hover-fillLight" d="M24 0c13.255 0 24 10.745 24 24S37.255 48 24 48 0 37.255 0 24 10.745 0 24 0z"></path><path fill="#FFF" d="M39.558 30.977c-6.23 6.225-16.304 6.194-22.535-.03l13.975-13.962c-6.232-6.224-16.335-6.224-22.567 0-4.043 4.04-5.456 9.712-4.247 14.896l-.654.174a21.89 21.89 0 0 1-1.536-8.61c.284-11.806 10.003-21.35 21.823-21.446 6.15-.05 11.72 2.42 15.744 6.438 6.23 6.226 6.23 16.318 0 22.542z"></path><path fill="#159570" class="hover-fillDark" d="M33.653 21.413c1.43 5.336-1.735 10.82-7.068 12.25-5.332 1.43-10.814-1.736-12.242-7.072-1.43-5.334 1.735-10.82 7.068-12.25 5.334-1.43 10.815 1.738 12.244 7.074z"></path></svg>
						<div class="productLinkContent">
							<h3 class="linkTitle">services</h3>
							<p class="linkSub">The smart engine for recurring&nbsp;payments.</p>
						</div>
					</a>
					</li>
					<li>
					<a class="linkContainer item-connect" href="https://stripe.com/connect">
						<svg viewBox="0 0 48 48"><path fill="#68D4F8" class="hover-fillLight" d="M48 24c0 13.255-10.745 24-24 24S0 37.255 0 24 10.745 0 24 0c1.363 0 2.698.12 4 .338V15h5v5h14.662c.218 1.302.338 2.637.338 4z"></path><path fill="#FFF" d="M16.99 29.966L17 17l-5.55-.006a1.02 1.02 0 0 0-.725.3L2.65 25.446a1.55 1.55 0 0 0-.44 1.28c1.22 9.944 9.1 17.825 19.042 19.047.472.058.945-.104 1.28-.44l8.172-8.076c.192-.193.3-.453.3-.725L31 31l-12.985-.01a1.023 1.023 0 0 1-1.024-1.024z"></path><path fill="#217AB7" class="hover-fillDark" d="M47.697 20.195L37.194 30.702a1.03 1.03 0 0 1-.726.3h-5.462V18.03c0-.567-.46-1.025-1.025-1.025H16.994V11.52c0-.274.108-.534.3-.726L27.783.3C38 1.916 46.07 9.98 47.698 20.194z"></path></svg>
						<div class="productLinkContent">
						<h3 class="linkTitle">Connect</h3>
						<p class="linkSub">Everything platforms need to get sellers&nbsp;paid.</p>
						</div>
					</a>
            </li>
					<li>
        <a class="linkContainer item-relay" href="https://stripe.com/relay">
						<svg viewBox="0 0 48 48"><path fill="#FFA27B" class="hover-fillLight" d="M24 0c13.255 0 24 10.745 24 24S37.255 48 24 48 0 37.255 0 24 10.745 0 24 0z"></path><path fill="#C23D4B" class="hover-fillDark" d="M24 12.5c8.285 0 15 6.828 15 15.25S32.285 43 24 43c-8.284 0-15-6.828-15-15.25S15.716 12.5 24 12.5z"></path><path fill="#FFF" d="M25 38.925v6.288a.787.787 0 0 1-.788.787h-.424a.787.787 0 0 1-.788-.788v-6.287c-3.668-.49-6.5-3.623-6.5-7.425a7.5 7.5 0 0 1 15 0c0 3.802-2.832 6.935-6.5 7.425z"></path></svg>
						<div class="productLinkContent">
						<h3 class="linkTitle">Relay</h3>
						<p class="linkSub">Sell your products in other mobile&nbsp;apps.</p>
						</div>
					</a>
                    </li>
					<li>
                    <a class="linkContainer item-atlas" href="https://stripe.com/atlas">
						<svg viewBox="0 0 48 48"><path fill="#FCD669" class="hover-fillLight" d="M24 0c13.255 0 24 10.745 24 24S37.255 48 24 48 0 37.255 0 24 10.745 0 24 0z"></path><path fill="#CE7C3A" class="hover-fillDark" d="M24.012 1.834c.366.005.73.196.92.575l16.825 33.72c.396.79-.314 1.685-1.175 1.48L24 33.626V1.834h.01z"></path><path fill="#FFF" d="M24 1.834v31.794l-16.584 3.98A1.043 1.043 0 0 1 6.24 36.13L23.067 2.41c.195-.39.572-.58.947-.576H24z"></path></svg>
						<div class="productLinkContent">
						<h3 class="linkTitle">Atlas</h3>
						<p class="linkSub">A new way to start an internet&nbsp;business.</p>
						</div>
					</a>
                    </li>
					<li><a class="linkContainer item-radar" href="https://stripe.com/radar">
						<svg viewBox="0 0 48 48"><path class="hover-fillLight" fill="#F6A4EB" d="M41.364 21.886h6.538c.06.697.098 1.4.098 2.114 0 13.255-10.745 24-24 24S0 37.255 0 24 10.745 0 24 0c6.833 0 12.993 2.86 17.364 7.442v14.444z"></path><path fill="#FFF" d="M37.746 37.4a1.3 1.3 0 0 1 .92-.38c.72 0 1.303.444 1.303 1.163 0 .503-.353.982-.708 1.292-3.484 3.122-8.325 5.53-13.783 5.53-11.75 0-19.486-9.538-19.486-18.83 0-8.72 7.195-16.19 15.25-16.19s11.227 5.54 11.227 5.54L37.747 37.4z"></path><path class="hover-fillDark" fill="#9251AC" d="M47.995 24zm0 0c0-.995-.807-1.974-1.802-1.974-1.15 0-1.8.94-1.8 1.83-.09 3.174-1.228 7.127-3.453 10.182-2.355 3.232-6.91 6.956-13.242 6.956-7.625 0-13.213-5.767-13.213-11.925 0-4.3 2.886-7.17 5.828-7.17 1.588 0 2.48.683 2.965 1.312.362.468 1.063.493 1.482.074L40.968 7.032A23.926 23.926 0 0 1 47.995 24z"></path></svg>
						<div class="productLinkContent">
						<h3 class="linkTitle">Radar <span class="new-badge">New</span></h3>
						<p class="linkSub">Modern tools to help beat fraud, integrated with your&nbsp;payments.</p>
						</div>
					</a></li>
					</ul>
				</div>

				<ul class="linkGroup linkList prodsubGroup">
					<li>
					<a class="linkContainer item-pricing" href="https://stripe.com/pricing" data-analytics-action="pricing" data-action-source="nav">
						<h3 class="linkTitle linkIcon"><svg width="17" height="17"><path fill="#6772E5" class="hover-fillDark" d="M15.998 6.98c0 .24-.083.458-.217.635a1.373 1.373 0 0 1-.187.24l-7.736 7.742c-.534.534-1.4.534-1.934 0L1.41 11.08a1.37 1.37 0 0 1 0-1.935l7.736-7.743c.15-.15.33-.255.52-.32a.918.918 0 0 1 .16-.048c.136-.03.275-.034.412-.02l4.192.002c.867 0 1.57.665 1.57 1.486l-.002 4.48zm-2.366-3.62a1.254 1.254 0 0 0-1.772 1.77 1.254 1.254 0 0 0 1.772-1.77z"></path><path fill="#87BBFD" class="hover-fillLight" d="M5.143 10.396l3.253-3.254c.2-.2.523-.2.722 0l.723.723c.2.2.2.524.003.723L6.59 11.842c-.2.2-.524.2-.724 0l-.723-.724a.51.51 0 0 1 0-.723z"></path></svg>Pricing</h3>
					</a>
					</li>
					<li><a class="linkContainer item-workswith" href="https://stripe.com/works-with">
						<h3 class="linkTitle linkIcon"><svg width="17" height="17"><path class="hover-fillLight" fill="#87BBFD" d="M15.998 12.495a1.03 1.03 0 0 1-.595.908L8.93 16.395a1.018 1.018 0 0 1-.86 0l-6.473-2.992a1.03 1.03 0 0 1-.594-.908V4.51c.006-.2.07-.39.18-.55L8.5 7.338l7.32-3.38c.108.16.172.35.178.55v7.984z"></path><path class="hover-fillDark" fill="#6772E5" d="M15.998 12.495a1.03 1.03 0 0 1-.595.908L8.93 16.395a1.026 1.026 0 0 1-.43.095V7.34l7.32-3.38c.11.16.173.35.18.55v7.984z"></path><path class="hover-fillLight" fill="#87BBFD" d="M8.5 5C6.567 5 5 4.228 5 3.275v-1.15h.098c.36.768 1.742 1.34 3.402 1.34 1.66.002 3.043-.572 3.402-1.34H12v1.15C12 4.228 10.433 5 8.5 5z"></path></svg>Works with Stripe</h3>
					</a></li>
				</ul>

				</div>
			</div>

			<div class="dropdownSection active" data-dropdown="offerings">
				<div class="dropdownContent">

				<div class="linkGroup documentationGroup">
					<a class="linkContainer withIcon item-documentation" href="https://stripe.com/docs">
						<h3 class="linkTitle linkIcon"><svg width="17" height="17"><path fill="#87BBFD" class="hover-fillLight" d="M.945 1.998h3.632C6.744 1.998 8.5 3.005 8.5 4.83v11.583c-.512 0-1.015-.337-1.33-.59-1.03-.828-3.057-.828-5.222-.828H.945A.944.944 0 0 1 0 14.052V2.944C0 2.422.423 2 .945 2z"></path><path fill="#6772E5" class="hover-fillDark" d="M16.055 1.998h-3.632C10.257 1.998 8.5 3.005 8.5 4.83v11.583c.512 0 1.015-.337 1.33-.59 1.03-.828 3.057-.828 5.222-.828h1.003A.944.944 0 0 0 17 14.05V2.945A.944.944 0 0 0 16.055 2z"></path></svg> Our Company</h3>
						<span class="linkSub">Start integrating Stripe’s products and&nbsp;tools.</span>
					</a>
					<div class="documentationArticles">
						<ul>
							<li><h4>Services</h4></li>
							<li><a href="#">design / build</a></li>
							<li><a href="#">program</a></li>
							<li><a href="#">alternative project delivery</a></li>
							<li><a href="#">drafting</a></li>
							<li><a href="#">bim</a></li>
							<li><a href="#">creative</a></li>
							<li><a href="#">fabrication</a></li>
							<li><a href="#">installation</a></li>
							<li><a href="#">maintenance</a></li>
							<li><a href="#">tvd</a></li>
							<li><a href="#">national brand management</a></li>
							<li><a href="#">visioneering</a></li>
						</ul>
						<ul>
							<li><h4>Work</h4></li>
							<li><a href="#">placemaking</a></li>
							<li><a href="#">branded environments</a></li>
							<li><a href="#">tech integration</a></li>
							<li><a href="#">pedestrian engagement</a></li>
							<li><a href="#">theming</a></li>
							<li><h4>Work</h4></li>
							<li><a href="#">pro sports</a></li>
							<li><a href="#">corporate</a></li>
							<li><a href="#">entertainment + mu</a></li>
							<li><a href="#">retail</a></li>
							<li><a href="#">healthcare</a></li>
							<li><a href="#">museums + civic</a></li>
							<li><a href="#">national</a></li>
							<li><a href="#">hospitality</a></li>
							<li><a href="#">casino</a></li>
						</ul>
					</div>
				</div>
				<!-- OFFERINGS -->
				<ul class="linkGroup linkList offeringsGroup">
					<li>
						<a class="linkContainer item-apiReference" href="https://stripe.com/docs/api">
							<h3 class="linkTitle linkIcon"><svg width="17" height="17"><path d="M2 15h13M2 11h13M2 7h13M2 3h13" fill="none" stroke="#6772e5" class="hover-strokeDark" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>Full API Reference</h3>
						</a>
					</li>
					<li>
						<a class="linkContainer item-apiStatus" href="https://status.stripe.com">
							<h3 class="linkTitle linkIcon"><svg width="17" height="17"><path d="M1 9h2.95l3-6.5 3 12 3-5.45L16 9" fill="none" stroke="#6772e5" class="hover-strokeDark" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>API Status</h3>
						</a>
					</li>
					<li>
						<a class="linkContainer item-openSource" href="https://stripe.com/open-source">
							<h3 class="linkTitle linkIcon"><svg width="17" height="17"><path fill="#6772E5" class="hover-fillDark" d="M8.5 17a8.5 8.5 0 1 1 0-17 8.5 8.5 0 0 1 0 17zM6.987 6.078a.684.684 0 0 0-.968-.968L3.116 8.012a.684.684 0 0 0 0 .967l2.9 2.9a.684.684 0 0 0 .97-.967l-2.42-2.418 2.42-2.42zm6.996 1.95L11.08 5.123a.684.684 0 0 0-.966.968l2.418 2.42-2.418 2.417a.684.684 0 0 0 .967.967l2.904-2.902a.684.684 0 0 0 0-.966z"></path></svg>Open Source</h3>
						</a>
					</li>
				</ul><!-- offeringsGroup -->

				</div>
			</div>

			<div class="dropdownSection right" data-dropdown="company">
				<div class="dropdownContent">

				<ul class="linkGroup linkList companyGroup">
					<li><a class="linkContainer item-about" href="https://stripe.com/about">
					<h3 class="linkTitle linkIcon"><svg width="17" height="17"><path fill="#6772E5" class="hover-fillDark" d="M8.5 17a8.5 8.5 0 1 1 0-17 8.5 8.5 0 0 1 0 17zm.178-10.89c.76 0 1.726.278 2.486.69V4.443c-.828-.33-1.656-.502-2.484-.502-2.028 0-3.41 1.06-3.41 2.83 0 2.77 3.8 2.32 3.8 3.513 0 .462-.37.612-.93.612-.827 0-1.867-.366-2.706-.823v2.388c.93.4 1.843.592 2.705.592 2.077 0 3.48-1.027 3.48-2.827 0-2.98-3.82-2.447-3.82-3.572-.003-.39.352-.542.877-.542z"></path></svg>About Stripe</h3>
					</a></li>
					<li><a class="linkContainer item-customers" href="https://stripe.com/customers">
					<h3 class="linkTitle linkIcon"><svg width="17" height="17"><path fill="#87BBFD" class="hover-fillLight" d="M2 16a1 1 0 0 1-1-1V9a4 4 0 0 1 8 0v7H2zm3-9a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"></path><path fill="#6772E5" class="hover-fillDark" d="M15 16H9a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h.55a2.5 2.5 0 0 1 4.9 0H15a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1z"></path><path fill="#87BBFD" class="hover-fillLight" d="M11 12h2v4h-2v-4z"></path></svg>Customers</h3>
					</a></li>
					<li><a class="linkContainer item-jobs" href="https://stripe.com/jobs">
					<h3 class="linkTitle linkIcon"><svg width="17" height="17"><path fill="#6772E5" class="hover-fillDark" d="M1.5 4h14c.828 0 1.5.67 1.5 1.5v8a1.5 1.5 0 0 1-1.5 1.5h-14A1.5 1.5 0 0 1 0 13.5v-8C0 4.67.67 4 1.5 4z"></path><path fill="#87BBFD" class="hover-fillLight" d="M13 15V4h2v11h-2zM2 4h2v11H2V4z"></path><path fill="#6772E5" class="hover-fillDark" d="M11.5 3.5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1V4H4v-.5A2.5 2.5 0 0 1 6.5 1h4A2.5 2.5 0 0 1 13 3.5V4h-1.5v-.5z"></path></svg>Jobs</h3>
					</a></li>
				</ul>

				<div class="linkGroup blogGroup">
					<a class="linkContainer withIcon item-blog" href="https://stripe.com/blog">
					<h3 class="linkTitle linkIcon"><svg width="17" height="17"><path fill="#87BBFD" class="hover-fillLight" d="M1 4h4.5v11H1.75A1.75 1.75 0 0 1 0 13.25V5a1 1 0 0 1 1-1z"></path><path fill="#6772E5" class="hover-fillDark" d="M14 15H2v-.025a2.243 2.243 0 0 0 2-2.225V3a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v9a3 3 0 0 1-3 3zm1-11H6v3h9V4z"></path></svg>From the blog</h3>
					</a>
					<ul class="blogPosts">
					<li><a href="/blog/reproducible-research">
						<span class="title ">Reproducible research: Stripe’s approach to data science</span>

					</a></li>
					<li><a href="/blog/started-on-stripe-atlas">
						<span class="title ">Started on Stripe Atlas</span>

					</a></li>
					<li><a href="/blog/works-with-stripe">
						<span class="title ">Works with Stripe</span>

					</a></li>
					</ul>
				</div>

				</div>
			</div>

			</div>
		</div>

	</header>


<script>
/**
 * Header
 */

const globalNavigationDropdowns = element => {
	let t = this;
	t.container        = document.querySelector(element);
	t.root             = t.container.querySelector('.navRoot');
	t.primaryNav       = t.root.querySelector('navSection.primary');
	t.primaryNavItem   = t.root.querySelector('navSection.primary .rootLink:last-child');
	t.secondaryNavItem = t.root.querySelector('navSection.secondary .rootLink:first-child');
	this.checkCollision();
};
function globalNavDropdowns(e) {
	var t                      = this;
	this.container             = document.querySelector(e),
	this.root                  = this.container.querySelector(".navRoot"),
	this.primaryNav            = this.root.querySelector(".navSection.primary"),
	this.primaryNavItem        = this.root.querySelector(".navSection.primary .rootLink:last-child"),
	this.secondaryNavItem      = this.root.querySelector(".navSection.secondary .rootLink:first-child"),
	this.checkCollision(),
	window.addEventListener("load", this.checkCollision.bind(this)),
	window.addEventListener("resize", this.checkCollision.bind(this)),
	this.container.classList.add("noDropdownTransition"),
	this.dropdownBackground    = this.container.querySelector(".dropdownBackground"),
	this.dropdownBackgroundAlt = this.container.querySelector(".alternateBackground"),
	this.dropdownContainer     = this.container.querySelector(".dropdownContainer"),
	this.dropdownArrow         = this.container.querySelector(".dropdownArrow"),
	this.dropdownRoots         = Strut.queryArray(".hasDropdown", this.root),
	this.dropdownSections      = Strut.queryArray(".dropdownSection", this.container).map(function(e) {
		return {
			el:      e,
			name:    e.getAttribute("data-dropdown"),
			content: e.querySelector(".dropdownContent")
		}
	});
	var n = window.PointerEvent ? {
		end:   "pointerup",
		enter: "pointerenter",
		leave: "pointerleave"
	} : {
		end:   "touchend",
		enter: "mouseenter",
		leave: "mouseleave"
	};
	this.dropdownRoots.forEach(function(e, r) {
		e.addEventListener(n.end, function(n) {
			n.preventDefault(), n.stopPropagation(), t.toggleDropdown(e)
		}), e.addEventListener(n.enter, function(n) {
			if (n.pointerType == "touch") return;
			t.stopCloseTimeout(), t.openDropdown(e)
		}), e.addEventListener(n.leave, function(e) {
			if (e.pointerType == "touch") return;
			t.startCloseTimeout()
		})
	}), this.dropdownContainer.addEventListener(n.end, function(e) {
		e.stopPropagation()
	}), this.dropdownContainer.addEventListener(n.enter, function(e) {
		if (e.pointerType == "touch") return;
		t.stopCloseTimeout()
	}), this.dropdownContainer.addEventListener(n.leave, function(e) {
		if (e.pointerType == "touch") return;
		t.startCloseTimeout()
	}), document.body.addEventListener(n.end, function(e) {
		Strut.touch.isDragging || t.closeDropdown()
	})
}

function globalNavPopup(e) {
	var t = this,
		n = Strut.touch.isSupported ? "touchend" : "click";
	this.activeClass = "globalPopupActive",
	this.root = document.querySelector(e),
	this.link = this.root.querySelector(".rootLink"),
	this.popup = this.root.querySelector(".popup"),
	this.closeButton = this.root.querySelector(".popupCloseButton"),
	this.link.addEventListener(n, function(e) {
		e.stopPropagation(), t.togglePopup()
	}),
	this.popup.addEventListener(n, function(e) {
		e.stopPropagation()
	}),
	this.closeButton && this.closeButton.addEventListener(n, function(e) {
		t.closeAllPopups()
	}),
	document.body.addEventListener(n, function(e) {
		Strut.touch.isDragging || t.closeAllPopups()
	}, !1)
}

(function() {
	window.$ && window.$.ajaxPrefilter && $(function() {
		return $.ajaxPrefilter(function(e, t, n) {
			var r, i;
			return i = $("meta[name=csrf-token]"), r = i ? i.attr("content") : "", n.setRequestHeader("x-stripe-csrf-token", r)
		})
	})
}).call(this),
	function() {
		function i(e, t, n) {
			if (!("Analytics" in window)) return;
			n ? window.Analytics[e](t, {
				source: n
			}) : window.Analytics[e](t)
		}

		function s(e, t, n, r) {
			e.addEventListener("click", function(e) {
				i(t, n, r)
			})
		}

		function o() {
			var n = document.querySelectorAll("[" + e + "]");
			[].slice.call(n).forEach(function(n) {
				s(n, "action", n.getAttribute(e), n.getAttribute(t))
			})
		}

		function u(e) {
			var t = document.querySelectorAll("[" + n + "]");
			[].slice.call(t).forEach(function(e) {
				s(e, "modal", e.getAttribute(n), e.getAttribute(r))
			})
		}
		var e = "data-analytics-action",
			t = "data-action-source",
			n = "data-analytics-modal",
			r = "data-modal-source";
		document.addEventListener("DOMContentLoaded", function() {
			o(), u()
		})
	}(), "use strict";

var Strut = {
	random: function(e, t) {
		return Math.random() * (t - e) + e
	},
	arrayRandom: function(e) {
		return e[Math.floor(Math.random() * e.length)]
	},
	interpolate: function(e, t, n) {
		return e * (1 - n) + t * n
	},
	rangePosition: function(e, t, n) {
		return (n - e) / (t - e)
	},
	clamp: function(e, t, n) {
		return Math.max(Math.min(e, n), t)
	},
	queryArray: function(e, t) {
		return t || (t = document.body), Array.prototype.slice.call(t.querySelectorAll(e))
	},
	ready: function(e) {
		document.readyState !== "loading" ? e() : document.addEventListener("DOMContentLoaded", e)
	}
};
Strut.isRetina = window.devicePixelRatio > 1.3,
Strut.mobileViewportWidth = 670,
Strut.isMobileViewport = window.innerWidth < Strut.mobileViewportWidth,
window.addEventListener("resize", function() {
	Strut.isMobileViewport = window.innerWidth < Strut.mobileViewportWidth
}),
Strut.touch = {
	isSupported: "ontouchstart" in window || navigator.maxTouchPoints,
	isDragging: !1
},
document.addEventListener("DOMContentLoaded", function() {
	document.body.addEventListener("touchmove", function() {
		Strut.touch.isDragging = !0
	}),
	document.body.addEventListener("touchstart", function() {
		Strut.touch.isDragging = !1
	})
}),
Strut.load = {
	images: function(e, t) {
		typeof e == "string" && (e = [e]);
		var n = -e.length;
		e.forEach(function(e) {
			var r = new Image;
			r.src = e, r.onload = function() {
				n++, n === 0 && t && t()
			}
		})
	},
	css: function(e, t) {
		var n = document.createElement("link"),
			r = window.readConfig("strut_files") || {},
			i = r[e];
		if (!i) throw new Error('CSS file "' + e + '" not found in strut_files config');
		n.href = i, n.rel = "stylesheet", document.head.appendChild(n), t && (n.onload = t)
	},
	js: function(e, t) {
		var n = document.createElement("script"),
			r = window.readConfig("strut_files") || {},
			i = r[e];
		if (!i) throw new Error('Javascript file "' + e + '" not found in strut_files config');
		n.src = i, document.head.appendChild(n), t && (n.onload = t)
	}
},
Strut.supports = {
	es6: function() {
		try {
			return new Function("(a = 0) => a"), !0
		} catch (e) {
			return !1
		}
	}(),
	pointerEvents: function() {
		var e = document.createElement("a").style;
		return e.cssText = "pointer-events:auto", e.pointerEvents === "auto"
	}(),
	positionSticky: function() {
		var e = "position:",
			t = "sticky",
			n = document.createElement("a"),
			r = n.style,
			i = " -webkit- -moz- -o- -ms- ".split(" ");
		return r.cssText = e + i.join(t + ";" + e).slice(0, -e.length), r.position.indexOf(t) !== -1
	}(),
	masks: function() {
		return !/MSIE|Trident|Edge/i.test(navigator.userAgent)
	}()
},
globalNavDropdowns.prototype.checkCollision = function() {
	var e = this;
	if (Strut.isMobileViewport) return;
	if (e.compact == 1) {
		var t = document.body.clientWidth,
			n = e.primaryNav.getBoundingClientRect();
		n.left + n.width / 2 > t / 2 && (e.container.classList.remove("compact"), e.compact = !1)
	} else {
		var r = e.primaryNavItem.getBoundingClientRect(),
			i = e.secondaryNavItem.getBoundingClientRect();
		r.right > i.left && (e.container.classList.add("compact"), e.compact = !0)
	}
},
globalNavDropdowns.prototype.openDropdown = function(e) {
	var t = this;
	if (this.activeDropdown === e) return;
	this.container.classList.add("overlayActive"), this.container.classList.add("dropdownActive"), this.activeDropdown = e, this.dropdownRoots.forEach(function(e, t) {
		e.classList.remove("active")
	}), e.classList.add("active");
	var n = e.getAttribute("data-dropdown"),
		r = "left",
		i, s, o;
	this.dropdownSections.forEach(function(e) {
		e.el.classList.remove("active"), e.el.classList.remove("left"), e.el.classList.remove("right"), e.name == n ? (e.el.classList.add("active"), r = "right", i = e.content.offsetWidth, s = e.content.offsetHeight, o = e.content) : e.el.classList.add(r)
	});
	var u = 520,
		a = 400,
		f = i / u,
		l = s / a,
		c = e.getBoundingClientRect(),
		h = c.left + c.width / 2 - i / 2;
	h = Math.round(Math.max(h, 10)), clearTimeout(this.disableTransitionTimeout), this.enableTransitionTimeout = setTimeout(function() {
		t.container.classList.remove("noDropdownTransition")
	}, 50), this.dropdownBackground.style.transform = "translateX(" + h + "px) scaleX(" + f + ") scaleY(" + l + ")", this.dropdownContainer.style.transform = "translateX(" + h + "px)", this.dropdownContainer.style.width = i + "px", this.dropdownContainer.style.height = s + "px";
	var p = Math.round(c.left + c.width / 2);
	this.dropdownArrow.style.transform = "translateX(" + p + "px) rotate(45deg)";
	var d = o.children[0].offsetHeight / l;
	this.dropdownBackgroundAlt.style.transform = "translateY(" + d + "px)"
},
globalNavDropdowns.prototype.closeDropdown = function() {
	var e = this;
	if (!this.activeDropdown) return;
	this.dropdownRoots.forEach(function(e, t) {
		e.classList.remove("active")
	}), clearTimeout(this.enableTransitionTimeout), this.disableTransitionTimeout = setTimeout(function() {
		e.container.classList.add("noDropdownTransition")
	}, 50), this.container.classList.remove("overlayActive"), this.container.classList.remove("dropdownActive"), this.activeDropdown = undefined
},
globalNavDropdowns.prototype.toggleDropdown = function(e) {
	this.activeDropdown === e ? this.closeDropdown() : this.openDropdown(e)
},
globalNavDropdowns.prototype.startCloseTimeout = function() {
	var e = this;
	e.closeDropdownTimeout = setTimeout(function() {
		e.closeDropdown()
	}, 50)
},
globalNavDropdowns.prototype.stopCloseTimeout = function() {
	var e = this;
	clearTimeout(e.closeDropdownTimeout)
},
globalNavPopup.prototype.togglePopup = function() {
	var e = this.root.classList.contains(this.activeClass);
	this.closeAllPopups(!0), e || this.root.classList.add(this.activeClass)
},
globalNavPopup.prototype.closeAllPopups = function(e) {
	var t = document.getElementsByClassName(this.activeClass);
	for (var n = 0; n < t.length; n++) t[n].classList.remove(this.activeClass)
},
Strut.supports.pointerEvents || Strut.load.css("v3/shared/navigation_ie10.css"), Strut.ready(function() {
	new globalNavDropdowns(".globalNav"), new globalNavPopup(".globalNav .navSection.mobile"), new globalNavPopup(".globalFooterNav .select.country"), new globalNavPopup(".globalFooterNav .select.language")
});
</script>

					<?php

					// wp_nav_menu(
					// 	array(
					// 		'theme_location' => 'primary',
					// 		'menu_id'        => 'primary-menu',
					// 		'container'      => 'false',
					// 		'walker'         => new Stripe_Walker_Nav_Menu(),
					// 	)
					// );

					?>


