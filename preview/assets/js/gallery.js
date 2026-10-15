/**
 * Mansa Ram Mahajan & Co — Single Product Gallery & Variation Engine
 *
 * @package Mansa_Ram_Mahajan
 */

(function() {
  'use strict';

  document.addEventListener('DOMContentLoaded', function() {
    
    // Gallery Elements
    var activeImg = document.getElementById('mrmActiveProductImage');
    var videoWrapper = document.getElementById('mrmGalleryVideoWrapper');
    var inlineVideo = document.getElementById('mrmGalleryInlineVideo');
    var thumbs = document.querySelectorAll('#mrmThumbnailsRow .mrm-thumb-item');
    var prevBtn = document.getElementById('mrmGalleryPrev');
    var nextBtn = document.getElementById('mrmGalleryNext');

    var currentIndex = 0;

    function setGalleryIndex(index) {
      if (thumbs.length === 0) return;
      currentIndex = (index + thumbs.length) % thumbs.length;
      var activeThumb = thumbs[currentIndex];
      var type = activeThumb.getAttribute('data-type');

      // Update thumb styling
      thumbs.forEach(function(t) { t.classList.remove('active'); });
      activeThumb.classList.add('active');

      if (type === 'video') {
        if (activeImg) activeImg.style.display = 'none';
        if (videoWrapper && inlineVideo) {
          videoWrapper.style.display = 'block';
          inlineVideo.play();
        }
      } else {
        if (videoWrapper && inlineVideo) {
          inlineVideo.pause();
          videoWrapper.style.display = 'none';
        }
        if (activeImg) {
          var newSrc = activeThumb.getAttribute('data-src');
          if (newSrc) {
            activeImg.style.display = 'block';
            activeImg.src = newSrc;
          }
        }
      }
    }

    // Thumbnail Clicks
    thumbs.forEach(function(thumb, i) {
      thumb.addEventListener('click', function() {
        setGalleryIndex(i);
      });
    });

    // Prev / Next Chevrons
    if (prevBtn) {
      prevBtn.addEventListener('click', function() {
        setGalleryIndex(currentIndex - 1);
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', function() {
        setGalleryIndex(currentIndex + 1);
      });
    }

    // =========================================================================
    // VARIATIONS INTERACTION (Color & Size)
    // =========================================================================
    var colorPills = document.querySelectorAll('.mrm-pill-color');
    var selectedColorName = document.getElementById('mrmSelectedColorName');
    var displayPrice = document.getElementById('mrmProductDisplayPrice');
    var buyNowBtn = document.getElementById('mrmBuyNowBtn');

    colorPills.forEach(function(pill) {
      pill.addEventListener('click', function() {
        colorPills.forEach(function(p) { p.classList.remove('active'); });
        this.classList.add('active');
        var color = this.getAttribute('data-color');
        if (selectedColorName) selectedColorName.textContent = color;

        var price = this.getAttribute('data-price');
        if (price && displayPrice) {
          displayPrice.textContent = '₹ ' + Number(price).toLocaleString('en-IN') + '.00';
          if (buyNowBtn) {
            buyNowBtn.setAttribute('data-product-price', price);
          }
        }
      });
    });

    var sizePills = document.querySelectorAll('.mrm-pill-size');
    var selectedSizeName = document.getElementById('mrmSelectedSizeName');

    sizePills.forEach(function(pill) {
      pill.addEventListener('click', function() {
        sizePills.forEach(function(p) { p.classList.remove('active'); });
        this.classList.add('active');
        var size = this.getAttribute('data-size');
        if (selectedSizeName) selectedSizeName.textContent = size;
      });
    });

    // Add to Cart & Open Slide-in Cart Drawer from Right Side
    var addToCartBtn = document.getElementById('mrmAddToCartBtn');
    if (addToCartBtn) {
      addToCartBtn.addEventListener('click', function(e) {
        e.preventDefault();
        var originalText = this.innerHTML;
        this.innerHTML = '<span>✓ Added to Bag</span>';
        this.style.backgroundColor = '#1A1A1A';

        var activeColorPill = document.querySelector('.mrm-pill-color.active');
        var activeSizePill = document.querySelector('.mrm-pill-size.active');
        var selectedColor = activeColorPill ? activeColorPill.getAttribute('data-color') : 'RED';
        var selectedSize = activeSizePill ? activeSizePill.getAttribute('data-size') : 'FREE SIZE';
        var price = activeColorPill && activeColorPill.getAttribute('data-price') ? parseInt(activeColorPill.getAttribute('data-price'), 10) : 6995;
        var activeImg = document.getElementById('mrmActiveProductImage');
        var imgSrc = activeImg ? activeImg.getAttribute('src') : 'assets/images/Woman_wearing_red_bridal_lehenga_20261015215058.jpg';

        if (window.mrmAddToCart) {
          window.mrmAddToCart({
            id: 101,
            title: 'Crimson Red Embellished Draped Saree Gown',
            price: price,
            color: selectedColor,
            size: selectedSize,
            img: imgSrc,
            qty: 1
          });
        } else if (window.mrmOpenCartDrawer) {
          window.mrmOpenCartDrawer();
        }

        var self = this;
        setTimeout(function() {
          self.innerHTML = originalText;
          self.style.backgroundColor = '';
        }, 1800);
      });
    }

  });
})();
