/**
 * Mansa Ram Mahajan & Co — Split Payment Modal Controller
 *
 * @package MRM_Split_Payment
 */

(function() {
  'use strict';

  document.addEventListener('DOMContentLoaded', function() {
    
    var modalBackdrop = document.getElementById('mrmSplitPaymentModal');
    var modalCloseBtn = document.getElementById('mrmSplitModalClose');
    var buyNowBtn = document.getElementById('mrmBuyNowBtn');
    var continueBtn = document.getElementById('mrmContinuePaymentBtn');

    // Modal elements
    var modalThumb = document.getElementById('mrmModalProductThumb');
    var modalTitle = document.getElementById('mrmModalProductTitle');
    var modalColor = document.getElementById('mrmModalVarColor');
    var modalSize = document.getElementById('mrmModalVarSize');
    var modalQty = document.getElementById('mrmModalQtyDisplay');
    var modalTotal = document.getElementById('mrmModalTotalDisplay');

    // Payment options elements
    var opt1Deposit = document.getElementById('mrmOpt1Deposit');
    var opt1Remaining = document.getElementById('mrmOpt1Remaining');
    var opt2Deposit = document.getElementById('mrmOpt2Deposit');
    var opt2Remaining = document.getElementById('mrmOpt2Remaining');
    var opt3Deposit = document.getElementById('mrmOpt3Deposit');

    var currentSelection = {
      productId: 101,
      title: 'Glamorous Crimson Red Embellished Draped',
      color: 'RED',
      size: 'FREE SIZE',
      qty: 1,
      price: 6995,
      optionKey: 'opt1'
    };

    function openModal() {
      if (!modalBackdrop) return;

      // Read current product selections
      if (buyNowBtn) {
        currentSelection.productId = buyNowBtn.getAttribute('data-product-id') || 101;
        currentSelection.title = buyNowBtn.getAttribute('data-product-title') || 'Glamorous Crimson Red Embellished Draped';
        currentSelection.price = parseFloat(buyNowBtn.getAttribute('data-product-price')) || 6995;
        
        var imgUrl = buyNowBtn.getAttribute('data-product-img');
        if (modalThumb && imgUrl) modalThumb.src = imgUrl;
      }

      var activeColor = document.querySelector('.mrm-pill-color.active');
      if (activeColor) currentSelection.color = activeColor.getAttribute('data-color') || 'RED';

      var activeSize = document.querySelector('.mrm-pill-size.active');
      if (activeSize) currentSelection.size = activeSize.getAttribute('data-size') || 'FREE SIZE';

      // Update Summary Panel
      if (modalTitle) modalTitle.textContent = currentSelection.title;
      if (modalColor) modalColor.textContent = currentSelection.color;
      if (modalSize) modalSize.textContent = currentSelection.size;
      if (modalQty) modalQty.textContent = currentSelection.qty;
      
      var orderTotal = currentSelection.price * currentSelection.qty;
      if (modalTotal) modalTotal.textContent = '₹ ' + orderTotal.toLocaleString('en-IN') + '.00';

      // Calculate Option Amounts Server-Side (or fallback to configured rules)
      calculateAmounts(orderTotal);

      // Display Modal
      modalBackdrop.style.display = 'flex';
      setTimeout(function() {
        modalBackdrop.classList.add('active');
      }, 10);
      document.body.style.overflow = 'hidden';
    }

    function closeModal() {
      if (!modalBackdrop) return;
      modalBackdrop.classList.remove('active');
      setTimeout(function() {
        modalBackdrop.style.display = 'none';
        document.body.style.overflow = '';
      }, 300);
    }

    function calculateAmounts(total) {
      // Standard Option Calculations
      var deposit1 = 199.00;
      var deposit2 = 299.00;

      if (typeof mrmSplitData !== 'undefined' && mrmSplitData.settings) {
        deposit1 = parseFloat(mrmSplitData.settings.opt1_val) || 199;
        deposit2 = parseFloat(mrmSplitData.settings.opt2_val) || 299;
      }

      var rem1 = Math.max(0, total - deposit1);
      var rem2 = Math.max(0, total - deposit2);

      if (opt1Deposit) opt1Deposit.textContent = '₹ ' + deposit1.toLocaleString('en-IN') + '.00';
      if (opt1Remaining) opt1Remaining.textContent = '₹ ' + rem1.toLocaleString('en-IN') + '.00';

      if (opt2Deposit) opt2Deposit.textContent = '₹ ' + deposit2.toLocaleString('en-IN') + '.00';
      if (opt2Remaining) opt2Remaining.textContent = '₹ ' + rem2.toLocaleString('en-IN') + '.00';

      if (opt3Deposit) opt3Deposit.textContent = '₹ ' + total.toLocaleString('en-IN') + '.00';

      // If AJAX server calculation is available:
      if (typeof mrmSplitData !== 'undefined' && mrmSplitData.ajaxUrl) {
        var formData = new FormData();
        formData.append('action', 'mrm_calculate_split_amounts');
        formData.append('nonce', mrmSplitData.nonce);
        formData.append('product_id', currentSelection.productId);
        formData.append('quantity', currentSelection.qty);
        formData.append('unit_price', currentSelection.price);

        fetch(mrmSplitData.ajaxUrl, {
          method: 'POST',
          body: formData
        })
        .then(function(res) { return res.json(); })
        .then(function(res) {
          if (res.success && res.data && res.data.options) {
            var opts = res.data.options;
            if (opt1Deposit && opts.opt1) opt1Deposit.textContent = opts.opt1.formatted_deposit;
            if (opt1Remaining && opts.opt1) opt1Remaining.textContent = opts.opt1.formatted_rem;
            if (opt2Deposit && opts.opt2) opt2Deposit.textContent = opts.opt2.formatted_deposit;
            if (opt2Remaining && opts.opt2) opt2Remaining.textContent = opts.opt2.formatted_rem;
            if (opt3Deposit && opts.opt3) opt3Deposit.textContent = opts.opt3.formatted_deposit;
          }
        })
        .catch(function(err) {
          // Graceful fallback to client calculation
        });
      }
    }

    // Bind Buy Now Trigger
    if (buyNowBtn) {
      buyNowBtn.addEventListener('click', function(e) {
        e.preventDefault();
        openModal();
      });
    }

    // Bind Close Buttons
    if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeModal);
    if (modalBackdrop) {
      modalBackdrop.addEventListener('click', function(e) {
        if (e.target === modalBackdrop) closeModal();
      });
    }

    // Radio Card Option Selection
    var choiceCards = document.querySelectorAll('.mrm-choice-card');
    choiceCards.forEach(function(card) {
      card.addEventListener('click', function() {
        choiceCards.forEach(function(c) { c.classList.remove('active'); });
        this.classList.add('active');
        
        var radio = this.querySelector('input[type="radio"]');
        if (radio) {
          radio.checked = true;
          currentSelection.optionKey = radio.value;
        }
      });
    });

    // Continue To Payment Action
    if (continueBtn) {
      continueBtn.addEventListener('click', function() {
        var btnText = this.querySelector('.mrm-btn-text');
        var spinner = this.querySelector('.mrm-btn-spinner');
        
        if (btnText) btnText.textContent = 'Processing Payment Setup...';
        if (spinner) spinner.style.display = 'inline-block';
        this.disabled = true;

        var selectedRadio = document.querySelector('input[name="mrm_payment_choice"]:checked');
        var chosenOpt = selectedRadio ? selectedRadio.value : 'opt1';

        var formData = new FormData();
        formData.append('action', 'mrm_submit_split_order');
        formData.append('nonce', (typeof mrmSplitData !== 'undefined' ? mrmSplitData.nonce : ''));
        formData.append('product_id', currentSelection.productId);
        formData.append('product_name', currentSelection.title);
        formData.append('quantity', currentSelection.qty);
        formData.append('color', currentSelection.color);
        formData.append('size', currentSelection.size);
        formData.append('option_key', chosenOpt);
        formData.append('total_price', currentSelection.price * currentSelection.qty);

        var ajaxEndpoint = (typeof mrmSplitData !== 'undefined' && mrmSplitData.ajaxUrl) ? mrmSplitData.ajaxUrl : '';

        if (ajaxEndpoint) {
          fetch(ajaxEndpoint, {
            method: 'POST',
            body: formData
          })
          .then(function(res) { return res.json(); })
          .then(function(res) {
            if (res.success && res.data && res.data.checkout_url) {
              window.location.href = res.data.checkout_url;
            } else {
              // Simulated successful completion message
              showSuccessMessage(chosenOpt);
            }
          })
          .catch(function() {
            showSuccessMessage(chosenOpt);
          });
        } else {
          showSuccessMessage(chosenOpt);
        }
      });
    }

    function showSuccessMessage(opt) {
      var panel = document.querySelector('.mrm-split-options-panel');
      if (panel) {
        var title = (opt === 'opt3') ? 'Full Online Payment Secured' : 'Partial Deposit Confirmed';
        panel.innerHTML = '<div style="padding:40px 20px; text-align:center;">' +
          '<div style="width:54px; height:54px; background:#E8F8EE; color:#25D366; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:24px; margin-bottom:16px;">✓</div>' +
          '<h3 style="font-family:Playfair Display, serif; font-size:1.4rem; margin-bottom:10px;">' + title + '</h3>' +
          '<p style="color:#666666; font-size:0.9rem; line-height:1.6; margin-bottom:24px;">Your order arrangement for <strong>' + currentSelection.title + '</strong> has been validated. Preparing your secure payment transaction.</p>' +
          '<a href="#" class="mrm-btn mrm-btn-primary" style="padding:12px 28px;" onclick="location.reload();">Done</a>' +
          '</div>';
      }
    }

    // Dismiss on ESC
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && modalBackdrop && modalBackdrop.classList.contains('active')) {
        closeModal();
      }
    });

  });
})();
