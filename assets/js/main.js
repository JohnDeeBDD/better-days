/**
 * Better Days Theme - Main JavaScript
 *
 * Handles:
 * - Sticky header behavior
 * - Mobile menu toggle
 * - Scroll-based animations
 * - Smooth scrolling for anchor links
 */

( function() {
	'use strict';

	/**
	 * Sticky Header
	 */
	function initStickyHeader() {
		var header = document.getElementById( 'site-header' );
		if ( ! header ) {
			return;
		}

		var scrollThreshold = 50;

		function onScroll() {
			if ( window.scrollY > scrollThreshold ) {
				header.classList.add( 'scrolled' );
			} else {
				header.classList.remove( 'scrolled' );
			}
		}

		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll();
	}

	/**
	 * Mobile Menu Toggle
	 */
	function initMobileMenu() {
		var toggle = document.querySelector( '.menu-toggle' );
		var nav = document.getElementById( 'primary-navigation' );

		if ( ! toggle || ! nav ) {
			return;
		}

		toggle.addEventListener( 'click', function() {
			var isExpanded = toggle.getAttribute( 'aria-expanded' ) === 'true';
			toggle.setAttribute( 'aria-expanded', ! isExpanded );
			nav.classList.toggle( 'is-open' );
			document.body.style.overflow = ! isExpanded ? 'hidden' : '';
		} );

		// Close menu on link click
		var navLinks = nav.querySelectorAll( 'a' );
		navLinks.forEach( function( link ) {
			link.addEventListener( 'click', function() {
				toggle.setAttribute( 'aria-expanded', 'false' );
				nav.classList.remove( 'is-open' );
				document.body.style.overflow = '';
			} );
		} );

		// Close on escape key
		document.addEventListener( 'keydown', function( e ) {
			if ( e.key === 'Escape' && nav.classList.contains( 'is-open' ) ) {
				toggle.setAttribute( 'aria-expanded', 'false' );
				nav.classList.remove( 'is-open' );
				document.body.style.overflow = '';
				toggle.focus();
			}
		} );
	}

	/**
	 * Scroll Animations (Intersection Observer)
	 */
	function initScrollAnimations() {
		var animatedElements = document.querySelectorAll( '.animate-fade-up' );

		if ( ! animatedElements.length ) {
			return;
		}

		if ( 'IntersectionObserver' in window ) {
			var observer = new IntersectionObserver(
				function( entries ) {
					entries.forEach( function( entry ) {
						if ( entry.isIntersecting ) {
							entry.target.classList.add( 'is-visible' );
							observer.unobserve( entry.target );
						}
					} );
				},
				{
					threshold: 0.15,
					rootMargin: '0px 0px -40px 0px',
				}
			);

			animatedElements.forEach( function( el ) {
				observer.observe( el );
			} );
		} else {
			// Fallback: show all elements immediately
			animatedElements.forEach( function( el ) {
				el.classList.add( 'is-visible' );
			} );
		}
	}

	/**
	 * Smooth Scrolling for Anchor Links
	 */
	function initSmoothScroll() {
		document.addEventListener( 'click', function( e ) {
			var link = e.target.closest( 'a[href^="#"]' );
			if ( ! link ) {
				return;
			}

			var targetId = link.getAttribute( 'href' );
			if ( targetId === '#' ) {
				return;
			}

			var target = document.querySelector( targetId );
			if ( ! target ) {
				return;
			}

			e.preventDefault();

			var headerHeight = document.getElementById( 'site-header' );
			var offset = headerHeight ? headerHeight.offsetHeight + 20 : 20;

			var targetPosition = target.getBoundingClientRect().top + window.scrollY - offset;

			window.scrollTo( {
				top: targetPosition,
				behavior: 'smooth',
			} );
		} );
	}

	/**
	 * Initialize everything on DOM ready
	 */
	document.addEventListener( 'DOMContentLoaded', function() {
		initStickyHeader();
		initMobileMenu();
		initScrollAnimations();
		initSmoothScroll();
	} );

} )();
