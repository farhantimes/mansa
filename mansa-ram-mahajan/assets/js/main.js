/**
 * Mansa Ram Mahajan & Co Master JavaScript
 *
 * @package Mansa_Ram_Mahajan
 * @version 1.0.0
 */

(function() {
  'use strict';

  document.addEventListener('DOMContentLoaded', function() {
    
    // =========================================================================
    // 1. ROTATING ANNOUNCEMENT BAR
    // =========================================================================
    var slides = document.querySelectorAll('.mrm-announcement-slide');
    if (slides.length > 1) {
      var currentSlide = 0;
      setInterval(function() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
      }, 4500);
    }

    // =========================================================================
    // 2. STICKY HEADER SHADOW ON SCROLL
    // =========================================================================
    var header = document.getElementById('mrmMainHeader');
    if (header) {
      window.addEventListener('scroll', function() {
        if (window.scrollY > 20) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
      }, { passive: true });
    }

    // =========================================================================
    // 3. MOBILE NAVIGATION DRAWER
    // =========================================================================
    var mobileToggle = document.getElementById('mrmMobileToggle');
    var mobileDrawer = document.getElementById('mrmMobileDrawer');
    var drawerOverlay = document.getElementById('mrmDrawerOverlay');
    var drawerClose = document.getElementById('mrmDrawerClose');

    function openDrawer() {
      if (mobileDrawer && drawerOverlay) {
        mobileDrawer.classList.add('active');
        drawerOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
    }

    function closeDrawer() {
      if (mobileDrawer && drawerOverlay) {
        mobileDrawer.classList.remove('active');
        drawerOverlay.classList.remove('active');
        document.body.style.overflow = '';
      }
    }

    if (mobileToggle) mobileToggle.addEventListener('click', openDrawer);
    if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
    if (drawerOverlay) drawerOverlay.addEventListener('click', closeDrawer);

    // =========================================================================
    // 4. LIVE PRODUCT SEARCH AUTOCOMPLETE
    // =========================================================================
    var searchInput = document.getElementById('mrmSearchInput');
    var searchContainer = document.getElementById('mrmSearchAutocomplete');
    var searchTimeout = null;

    if (searchInput && searchContainer) {
      searchInput.addEventListener('input', function() {
        var query = this.value.trim();
        clearTimeout(searchTimeout);

        if (query.length < 2) {
          searchContainer.style.display = 'none';
          searchContainer.innerHTML = '';
          return;
        }

        searchTimeout = setTimeout(function() {
          if (typeof mrmData !== 'undefined' && mrmData.ajaxUrl) {
            var formData = new FormData();
            formData.append('action', 'mrm_live_search');
            formData.append('keyword', query);
            formData.append('nonce', mrmData.nonce);

            fetch(mrmData.ajaxUrl, {
              method: 'POST',
              body: formData
            })
            .then(function(res) { return res.json(); })
            .then(function(data) {
              if (data.success && data.data && data.data.length > 0) {
                var html = '<ul class="mrm-autocomplete-list">';
                data.data.forEach(function(item) {
                  html += '<li class="mrm-autocomplete-item">';
                  html += '<a href="' + item.url + '">';
                  if (item.image) html += '<img src="' + item.image + '" alt="' + item.title + '" width="36" height="48">';
                  html += '<div class="mrm-auto-meta"><strong>' + item.title + '</strong><span>' + item.price + '</span></div>';
                  html += '</a></li>';
                });
                html += '</ul>';
                searchContainer.innerHTML = html;
                searchContainer.style.display = 'block';
              } else {
                searchContainer.innerHTML = '<div class="mrm-no-results">No products found for "' + query + '"</div>';
                searchContainer.style.display = 'block';
              }
            })
            .catch(function() {
              searchContainer.style.display = 'none';
            });
          }
        }, 300);
      });

      // Close autocomplete on click outside
      document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchContainer.contains(e.target)) {
          searchContainer.style.display = 'none';
        }
      });
    }

    // =========================================================================
    // 5. ACCORDIONS (Shipping & Returns, Specifications)
    // =========================================================================
    var accordions = document.querySelectorAll('.mrm-accordion-toggle');
    accordions.forEach(function(toggle) {
      toggle.addEventListener('click', function() {
        var isExpanded = this.getAttribute('aria-expanded') === 'true';
        var content = this.nextElementSibling;

        this.setAttribute('aria-expanded', !isExpanded);
        if (content) {
          content.style.display = isExpanded ? 'none' : 'block';
        }
      });
    });

    // =========================================================================
    // 6. SIZE GUIDE MODAL
    // =========================================================================
    var sizeGuideBtn = document.getElementById('mrmSizeGuideBtn');
    var sizeGuideModal = document.getElementById('mrmSizeGuideModal');
    var sizeGuideClose = document.getElementById('mrmSizeGuideClose');

    if (sizeGuideBtn && sizeGuideModal) {
      sizeGuideBtn.addEventListener('click', function() {
        sizeGuideModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
      });

      if (sizeGuideClose) {
        sizeGuideClose.addEventListener('click', function() {
          sizeGuideModal.style.display = 'none';
          document.body.style.overflow = '';
        });
      }

      sizeGuideModal.addEventListener('click', function(e) {
        if (e.target === sizeGuideModal) {
          sizeGuideModal.style.display = 'none';
          document.body.style.overflow = '';
        }
      });
    }

    // =========================================================================
    // 7A. LANDSCAPE HERO IMAGE SLIDER (Section 3)
    // =========================================================================
    var heroSliderWrapper = document.getElementById('mrmHeroSliderWrapper');
    var heroSlider = document.getElementById('mrmHeroSlider');
    var heroSlides = heroSlider ? heroSlider.querySelectorAll('.mrm-hero-slide') : [];
    var heroDots = document.querySelectorAll('#mrmHeroDots .mrm-hero-dot');
    var heroPrevBtn = document.getElementById('mrmHeroPrevBtn');
    var heroNextBtn = document.getElementById('mrmHeroNextBtn');
    var currentHeroIndex = 0;
    var heroAutoplayTimer = null;
    var heroAutoplayDelay = 5000;

    if (heroSlider && heroSlides.length > 1) {
      if (heroSlider.dataset.autoplay) {
        var parsed = parseInt(heroSlider.dataset.autoplay, 10);
        if (!isNaN(parsed) && parsed > 1000) heroAutoplayDelay = parsed;
      }

      function showHeroSlide(index) {
        if (index < 0) index = heroSlides.length - 1;
        if (index >= heroSlides.length) index = 0;
        currentHeroIndex = index;

        heroSlides.forEach(function(slide, i) {
          if (i === currentHeroIndex) {
            slide.classList.add('active');
          } else {
            slide.classList.remove('active');
          }
        });

        heroDots.forEach(function(dot, i) {
          if (i === currentHeroIndex) {
            dot.classList.add('active');
          } else {
            dot.classList.remove('active');
          }
        });
      }

      function startHeroAutoplay() {
        stopHeroAutoplay();
        heroAutoplayTimer = setInterval(function() {
          showHeroSlide(currentHeroIndex + 1);
        }, heroAutoplayDelay);
      }

      function stopHeroAutoplay() {
        if (heroAutoplayTimer) {
          clearInterval(heroAutoplayTimer);
          heroAutoplayTimer = null;
        }
      }

      if (heroPrevBtn) {
        heroPrevBtn.addEventListener('click', function(e) {
          e.preventDefault();
          showHeroSlide(currentHeroIndex - 1);
          startHeroAutoplay();
        });
      }

      if (heroNextBtn) {
        heroNextBtn.addEventListener('click', function(e) {
          e.preventDefault();
          showHeroSlide(currentHeroIndex + 1);
          startHeroAutoplay();
        });
      }

      heroDots.forEach(function(dot) {
        dot.addEventListener('click', function(e) {
          e.preventDefault();
          var targetIndex = parseInt(this.getAttribute('data-index'), 10);
          if (!isNaN(targetIndex)) {
            showHeroSlide(targetIndex);
            startHeroAutoplay();
          }
        });
      });

      if (heroSliderWrapper) {
        heroSliderWrapper.addEventListener('mouseenter', stopHeroAutoplay);
        heroSliderWrapper.addEventListener('mouseleave', startHeroAutoplay);

        var touchStartX = 0;
        var touchEndX = 0;
        heroSliderWrapper.addEventListener('touchstart', function(e) {
          touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        heroSliderWrapper.addEventListener('touchend', function(e) {
          touchEndX = e.changedTouches[0].screenX;
          if (touchStartX - touchEndX > 45) {
            showHeroSlide(currentHeroIndex + 1);
            startHeroAutoplay();
          } else if (touchEndX - touchStartX > 45) {
            showHeroSlide(currentHeroIndex - 1);
            startHeroAutoplay();
          }
        }, { passive: true });
      }

      startHeroAutoplay();
    }

    // =========================================================================
    // 7B. ATELIER VIDEO COLLECTION SLIDER (Section 11)
    // =========================================================================
    var videoSlider = document.getElementById('mrmVideoCollectionSlider');
    var videoCards = document.querySelectorAll('.mrm-video-card');
    var videoSliderPrev = document.getElementById('mrmVideoSliderPrev');
    var videoSliderNext = document.getElementById('mrmVideoSliderNext');
    var videoDots = document.querySelectorAll('#mrmVideoDots .mrm-video-dot');

    // Play/Pause center toggle
    var videoCenterBtns = document.querySelectorAll('.mrm-video-center-btn');
    videoCenterBtns.forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        var targetId = this.getAttribute('data-target');
        var videoEl = document.getElementById(targetId);
        var playIcon = this.querySelector('.icon-play');
        var pauseIcon = this.querySelector('.icon-pause');

        if (videoEl) {
          if (videoEl.paused) {
            document.querySelectorAll('.mrm-card-video').forEach(function(v) {
              if (v !== videoEl && !v.paused) v.pause();
            });
            document.querySelectorAll('.mrm-video-center-btn').forEach(function(b) {
              if (b !== btn) {
                var pi = b.querySelector('.icon-play');
                var pai = b.querySelector('.icon-pause');
                if (pi) pi.style.display = 'block';
                if (pai) pai.style.display = 'none';
              }
            });

            videoEl.play();
            if (playIcon) playIcon.style.display = 'none';
            if (pauseIcon) pauseIcon.style.display = 'block';
          } else {
            videoEl.pause();
            if (playIcon) playIcon.style.display = 'block';
            if (pauseIcon) pauseIcon.style.display = 'none';
          }
        }
      });
    });

    // Sound mute/unmute toggle
    var soundToggleBtns = document.querySelectorAll('.mrm-sound-toggle-btn');
    soundToggleBtns.forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        var targetId = this.getAttribute('data-target');
        var videoEl = document.getElementById(targetId);
        var mutedIcon = this.querySelector('.icon-muted');
        var unmutedIcon = this.querySelector('.icon-unmuted');

        if (videoEl) {
          videoEl.muted = !videoEl.muted;
          if (videoEl.muted) {
            if (mutedIcon) mutedIcon.style.display = 'block';
            if (unmutedIcon) unmutedIcon.style.display = 'none';
          } else {
            if (mutedIcon) mutedIcon.style.display = 'none';
            if (unmutedIcon) unmutedIcon.style.display = 'block';
          }
        }
      });
    });

    // Slider Next / Prev scroll
    if (videoSlider && videoSliderPrev && videoSliderNext) {
      videoSliderPrev.addEventListener('click', function(e) {
        e.preventDefault();
        var cardWidth = videoCards.length ? videoCards[0].offsetWidth + 28 : 340;
        videoSlider.scrollBy({ left: -cardWidth, behavior: 'smooth' });
      });

      videoSliderNext.addEventListener('click', function(e) {
        e.preventDefault();
        var cardWidth = videoCards.length ? videoCards[0].offsetWidth + 28 : 340;
        videoSlider.scrollBy({ left: cardWidth, behavior: 'smooth' });
      });
    }

    // Video Slider Dots Navigation
    videoDots.forEach(function(dot) {
      dot.addEventListener('click', function(e) {
        e.preventDefault();
        var idx = parseInt(this.getAttribute('data-index'), 10);
        if (videoCards[idx] && videoSlider) {
          videoSlider.scrollTo({
            left: videoCards[idx].offsetLeft - videoSlider.offsetLeft,
            behavior: 'smooth'
          });
        }
      });
    });

    // Expand Full Reel into Modal Player
    var expandReelBtns = document.querySelectorAll('.mrm-expand-reel-btn');
    expandReelBtns.forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        var videoSrc = this.getAttribute('data-video');
        var videoModal = document.getElementById('mrmVideoModal');
        var globalVideoPlayer = document.getElementById('mrmGlobalVideoPlayer');
        if (videoModal && globalVideoPlayer && videoSrc) {
          document.querySelectorAll('.mrm-card-video').forEach(function(v) { v.pause(); });
          document.querySelectorAll('.mrm-video-center-btn').forEach(function(b) {
            var pi = b.querySelector('.icon-play');
            var pai = b.querySelector('.icon-pause');
            if (pi) pi.style.display = 'block';
            if (pai) pai.style.display = 'none';
          });

          globalVideoPlayer.src = videoSrc;
          globalVideoPlayer.muted = false;
          videoModal.style.display = 'flex';
          globalVideoPlayer.play();
          document.body.style.overflow = 'hidden';
        }
      });
    });

    // =========================================================================
    // 8. LOOKBOOK VIDEO CARDS TRIGGER (Section 5)
    // =========================================================================
    var lookbookVideoCards = document.querySelectorAll('.mrm-lookbook-card[data-video]');
    var videoModal = document.getElementById('mrmVideoModal');
    var globalVideoPlayer = document.getElementById('mrmGlobalVideoPlayer');
    var videoModalClose = document.getElementById('mrmVideoModalClose');

    lookbookVideoCards.forEach(function(card) {
      card.addEventListener('click', function() {
        var videoSrc = this.getAttribute('data-video');
        if (videoModal && globalVideoPlayer && videoSrc) {
          globalVideoPlayer.src = videoSrc;
          videoModal.style.display = 'flex';
          globalVideoPlayer.play();
          document.body.style.overflow = 'hidden';
        }
      });
    });

    if (videoModalClose && videoModal && globalVideoPlayer) {
      videoModalClose.addEventListener('click', function() {
        globalVideoPlayer.pause();
        videoModal.style.display = 'none';
        document.body.style.overflow = '';
      });

      videoModal.addEventListener('click', function(e) {
        if (e.target === videoModal) {
          globalVideoPlayer.pause();
          videoModal.style.display = 'none';
          document.body.style.overflow = '';
        }
      });
    }

    // =========================================================================
    // 9. ESCAPE KEY MODALS DISMISS
    // =========================================================================
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeDrawer();
        closeCartDrawer();
        if (sizeGuideModal) sizeGuideModal.style.display = 'none';
        if (videoModal && globalVideoPlayer) {
          globalVideoPlayer.pause();
          videoModal.style.display = 'none';
        }
        document.body.style.overflow = '';
      }
    });

    // =========================================================================
    // 10. WISHLIST TOGGLE INTERACTION
    // =========================================================================
    var wishlistBtns = document.querySelectorAll('.mrm-wishlist-action');
    var wishlistCountBadge = document.getElementById('mrmWishlistCount');
    var currentCount = 0;

    wishlistBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        var svg = this.querySelector('svg');
        if (this.classList.contains('active')) {
          this.classList.remove('active');
          if (svg) svg.setAttribute('fill', 'none');
          currentCount = Math.max(0, currentCount - 1);
        } else {
          this.classList.add('active');
          if (svg) svg.setAttribute('fill', '#C42B59');
          currentCount++;
        }
        if (wishlistCountBadge) wishlistCountBadge.textContent = currentCount;
      });
    });

    // =========================================================================
    // 11. SLIDE-IN CART DRAWER (RIGHT SIDE) & CART STATE CONTROLLER
    // =========================================================================
    var cartOverlay = document.getElementById('mrmCartOverlay');
    var cartDrawer = document.getElementById('mrmCartDrawer');
    var cartCloseBtn = document.getElementById('mrmCartClose');
    var cartItemsList = document.getElementById('mrmCartItemsList');
    var cartEmptyState = document.getElementById('mrmCartEmpty');
    var cartFooter = document.getElementById('mrmCartFooter');
    var cartCountBadges = document.querySelectorAll('.mrm-cart-count');
    var cartDrawerCountBadge = document.getElementById('mrmCartDrawerCountBadge');
    var cartSubtotalVal = document.getElementById('mrmCartSubtotalVal');
    var shippingBarText = document.getElementById('mrmShippingBarText');
    var shippingProgressFill = document.getElementById('mrmShippingProgressFill');
    var cartSplitTrigger = document.getElementById('mrmCartSplitTrigger');

    // Cart items state
    var mrmCart = [
      {
        id: 101,
        title: 'Crimson Red Embellished Draped Saree Gown',
        price: 6995,
        color: 'RED',
        size: 'FREE SIZE',
        img: 'assets/images/Woman_wearing_red_bridal_lehenga_20261015215058.jpg',
        qty: 1
      }
    ];

    function openCartDrawer() {
      if (cartDrawer && cartOverlay) {
        renderCart();
        cartDrawer.classList.add('active');
        cartOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
    }

    function closeCartDrawer() {
      if (cartDrawer && cartOverlay) {
        cartDrawer.classList.remove('active');
        cartOverlay.classList.remove('active');
        document.body.style.overflow = '';
      }
    }

    window.mrmOpenCartDrawer = openCartDrawer;
    window.mrmCloseCartDrawer = closeCartDrawer;

    function renderCart() {
      var totalQty = 0;
      var subtotal = 0;

      mrmCart.forEach(function(item) {
        totalQty += item.qty;
        subtotal += item.price * item.qty;
      });

      // Update badges
      cartCountBadges.forEach(function(badge) {
        badge.textContent = totalQty;
      });
      if (cartDrawerCountBadge) {
        cartDrawerCountBadge.textContent = totalQty + (totalQty === 1 ? ' item' : ' items');
      }

      // Update Subtotal
      if (cartSubtotalVal) {
        cartSubtotalVal.textContent = '₹ ' + subtotal.toLocaleString('en-IN') + '.00';
      }

      // Free shipping threshold = ₹14,999
      var threshold = 14999;
      if (shippingBarText && shippingProgressFill) {
        if (subtotal >= threshold) {
          shippingProgressFill.style.width = '100%';
          shippingBarText.innerHTML = '<span>🎉 You have unlocked <strong>FREE Express Shipping</strong>!</span>';
        } else {
          var remaining = threshold - subtotal;
          var pct = Math.min(100, Math.round((subtotal / threshold) * 100));
          shippingProgressFill.style.width = pct + '%';
          shippingBarText.innerHTML = '<span>Add <strong>₹ ' + remaining.toLocaleString('en-IN') + '.00</strong> more to unlock <strong>FREE Express Shipping</strong>!</span>';
        }
      }

      // Empty state or items list
      if (!cartItemsList || !cartEmptyState || !cartFooter) return;

      if (mrmCart.length === 0) {
        cartItemsList.style.display = 'none';
        cartEmptyState.style.display = 'block';
        cartFooter.style.display = 'none';
      } else {
        cartItemsList.style.display = 'flex';
        cartEmptyState.style.display = 'none';
        cartFooter.style.display = 'block';

        var html = '';
        mrmCart.forEach(function(item, idx) {
          var itemTotal = item.price * item.qty;
          html += '<div class="mrm-cart-item" data-index="' + idx + '">';
          html += '  <div class="mrm-cart-item-thumb">';
          html += '    <img src="' + item.img + '" alt="' + item.title + '">';
          html += '  </div>';
          html += '  <div class="mrm-cart-item-info">';
          html += '    <h4 class="mrm-cart-item-title">' + item.title + '</h4>';
          html += '    <div class="mrm-cart-item-meta">';
          html += '      <span class="mrm-cart-meta-pill">Color: ' + item.color + '</span>';
          html += '      <span class="mrm-cart-meta-pill">Size: ' + item.size + '</span>';
          html += '    </div>';
          html += '    <div class="mrm-cart-item-price">₹ ' + itemTotal.toLocaleString('en-IN') + '.00</div>';
          html += '    <div class="mrm-cart-qty-row">';
          html += '      <div class="mrm-cart-qty-box">';
          html += '        <button type="button" class="mrm-qty-btn mrm-cart-qty-minus" data-index="' + idx + '" aria-label="Decrease quantity">−</button>';
          html += '        <span class="mrm-qty-val">' + item.qty + '</span>';
          html += '        <button type="button" class="mrm-qty-btn mrm-cart-qty-plus" data-index="' + idx + '" aria-label="Increase quantity">+</button>';
          html += '      </div>';
          html += '      <button type="button" class="mrm-cart-item-remove" data-index="' + idx + '" aria-label="Remove item">';
          html += '        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>';
          html += '        <span>Remove</span>';
          html += '      </button>';
          html += '    </div>';
          html += '  </div>';
          html += '</div>';
        });

        cartItemsList.innerHTML = html;
        bindCartItemEvents();
      }
    }

    function bindCartItemEvents() {
      var minusBtns = document.querySelectorAll('.mrm-cart-qty-minus');
      var plusBtns = document.querySelectorAll('.mrm-cart-qty-plus');
      var removeBtns = document.querySelectorAll('.mrm-cart-item-remove');

      minusBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
          var idx = parseInt(this.getAttribute('data-index'), 10);
          if (mrmCart[idx]) {
            mrmCart[idx].qty--;
            if (mrmCart[idx].qty <= 0) {
              mrmCart.splice(idx, 1);
            }
            renderCart();
          }
        });
      });

      plusBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
          var idx = parseInt(this.getAttribute('data-index'), 10);
          if (mrmCart[idx]) {
            mrmCart[idx].qty++;
            renderCart();
          }
        });
      });

      removeBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
          var idx = parseInt(this.getAttribute('data-index'), 10);
          if (mrmCart[idx]) {
            mrmCart.splice(idx, 1);
            renderCart();
          }
        });
      });
    }

    window.mrmAddToCart = function(item) {
      var existing = mrmCart.find(function(it) {
        return it.id === item.id && it.color === item.color && it.size === item.size;
      });
      if (existing) {
        existing.qty += (item.qty || 1);
      } else {
        mrmCart.push({
          id: item.id || Date.now(),
          title: item.title,
          price: parseInt(item.price, 10),
          color: item.color || 'STANDARD',
          size: item.size || 'FREE SIZE',
          img: item.img || 'assets/images/Woman_wearing_red_bridal_lehenga_20261015215058.jpg',
          qty: item.qty || 1
        });
      }
      renderCart();
      openCartDrawer();
    };

    // Bind Cart Trigger Buttons (Header cart icons, etc.)
    var cartTriggers = document.querySelectorAll('.mrm-cart-btn');
    cartTriggers.forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        openCartDrawer();
      });
    });

    if (cartCloseBtn) cartCloseBtn.addEventListener('click', closeCartDrawer);
    if (cartOverlay) cartOverlay.addEventListener('click', closeCartDrawer);

    // Cross-sell items '+ Add' buttons
    var crossAddBtns = document.querySelectorAll('.mrm-cross-add-btn');
    crossAddBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        var id = parseInt(this.getAttribute('data-id'), 10);
        var title = this.getAttribute('data-title');
        var price = parseInt(this.getAttribute('data-price'), 10);
        var color = this.getAttribute('data-color');
        var size = this.getAttribute('data-size');
        var img = this.getAttribute('data-img');

        window.mrmAddToCart({
          id: id,
          title: title,
          price: price,
          color: color,
          size: size,
          img: img,
          qty: 1
        });

        var self = this;
        self.innerHTML = '<span>✓ Added</span>';
        self.classList.add('added');
        setTimeout(function() {
          self.innerHTML = '<span>+ Add</span>';
          self.classList.remove('added');
        }, 2000);
      });
    });

    // Checkout Button
    var checkoutBtn = document.getElementById('mrmCheckoutBtn');
    if (checkoutBtn) {
      checkoutBtn.addEventListener('click', function() {
        var origHtml = this.innerHTML;
        this.innerHTML = '<span>Proceeding to Checkout...</span>';
        this.disabled = true;
        setTimeout(function() {
          window.location.href = 'shop.html';
        }, 1000);
      });
    }

    // Split-Payment trigger inside cart drawer
    if (cartSplitTrigger) {
      cartSplitTrigger.addEventListener('click', function() {
        closeCartDrawer();
        var buyNowBtn = document.getElementById('mrmBuyNowBtn');
        if (buyNowBtn) {
          buyNowBtn.click();
        } else {
          window.location.href = 'product.html';
        }
      });
    }

    // Initial Cart Render
    renderCart();

  });
})();
