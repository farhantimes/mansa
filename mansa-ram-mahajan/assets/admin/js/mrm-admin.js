/**
 * Mansa Ram Mahajan & Co — WordPress Admin Scripts
 * Media Picker, Color Sync, and Dynamic Table Repeaters
 */

jQuery(document).ready(function($) {
  'use strict';

  // 1. WordPress Media Library File Picker Integration
  $(document).on('click', '.mrm-upload-btn', function(e) {
    e.preventDefault();
    var $btn = $(this);
    var targetInputId = $btn.data('target');
    var $input = $('#' + targetInputId);
    var $preview = $('#preview_' + targetInputId);

    var mediaUploader = wp.media({
      title: 'Select or Upload Asset for Mansa Ram Mahajan',
      button: {
        text: 'Use Selected Asset'
      },
      multiple: false
    });

    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $input.val(attachment.url).trigger('change');
      if ($preview.length) {
        $preview.html('<img src="' + attachment.url + '" alt="Preview" style="max-width:100%; max-height:100%; object-fit:cover;">');
      }
    });

    mediaUploader.open();
  });

  // Clear media button
  $(document).on('click', '.mrm-clear-media-btn', function(e) {
    e.preventDefault();
    var targetInputId = $(this).data('target');
    $('#' + targetInputId).val('').trigger('change');
    var $preview = $('#preview_' + targetInputId);
    if ($preview.length) {
      $preview.html('<span style="color:#aaa; font-size:12px;">No Image</span>');
    }
  });

  // 2. Color Picker Sync
  $('.mrm-color-picker').on('input change', function() {
    var val = $(this).val();
    var textInput = $(this).siblings('.mrm-color-text');
    if (textInput.length) {
      textInput.val(val);
    }
  });

  $('.mrm-color-text').on('input change', function() {
    var val = $(this).val();
    if (/^#[0-9A-F]{6}$/i.test(val)) {
      $(this).siblings('.mrm-color-picker').val(val);
    }
  });

  // 3. Store Locations Repeater Serialization
  function serializeStores() {
    var stores = [];
    $('#mrm_stores_table tbody tr.mrm-store-row').each(function() {
      var $row = $(this);
      stores.push({
        city:     $row.find('.store-city').val(),
        title:    $row.find('.store-title').val(),
        address:  $row.find('.store-address').val(),
        phone:    $row.find('.store-phone').val(),
        timing:   $row.find('.store-timing').val(),
        image:    $row.find('.store-image').val(),
        maps_url: $row.find('.store-maps').val()
      });
    });
    $('#store_locations_json').val(JSON.stringify(stores));
  }

  $(document).on('click', '#mrm_add_store_row', function(e) {
    e.preventDefault();
    var rowCount = $('#mrm_stores_table tbody tr.mrm-store-row').length;
    var rowHtml = '<tr class="mrm-store-row mrm-repeater-row">' +
      '<td><input type="text" class="mrm-input-text store-city" value="New Boutique" style="width:120px;"></td>' +
      '<td><input type="text" class="mrm-input-text store-title" value="Mansa Ram Mahajan — Atelier" style="width:180px;"></td>' +
      '<td><input type="text" class="mrm-input-text store-address" value="Delhi NCR" style="width:200px;"></td>' +
      '<td><input type="text" class="mrm-input-text store-phone" value="+91 98111 22334" style="width:130px;"></td>' +
      '<td><input type="text" class="mrm-input-text store-timing" value="11:00 AM – 9:00 PM" style="width:140px;"></td>' +
      '<td>' +
        '<div class="mrm-media-row">' +
          '<input type="text" id="store_img_' + rowCount + '" class="mrm-input-text store-image" value="" style="width:160px;">' +
          '<button type="button" class="button mrm-upload-btn" data-target="store_img_' + rowCount + '">Upload</button>' +
        '</div>' +
      '</td>' +
      '<td><input type="text" class="mrm-input-text store-maps" value="https://maps.google.com" style="width:150px;"></td>' +
      '<td><button type="button" class="button mrm-btn-danger mrm-remove-row">Remove</button></td>' +
    '</tr>';
    $('#mrm_stores_table tbody').append(rowHtml);
    serializeStores();
  });

  $(document).on('click', '.mrm-remove-row', function(e) {
    e.preventDefault();
    if (confirm('Are you sure you want to remove this entry?')) {
      $(this).closest('tr').remove();
      serializeStores();
      serializeReviews();
    }
  });

  $(document).on('input change', '#mrm_stores_table input', function() {
    serializeStores();
  });

  // 4. Testimonials Repeater Serialization
  function serializeReviews() {
    var reviews = [];
    $('#mrm_reviews_table tbody tr.mrm-review-row').each(function() {
      var $row = $(this);
      reviews.push({
        name:   $row.find('.review-name').val(),
        city:   $row.find('.review-city').val(),
        tag:    $row.find('.review-tag').val(),
        rating: parseInt($row.find('.review-rating').val(), 10) || 5,
        quote:  $row.find('.review-quote').val(),
        active: 1
      });
    });
    $('#customer_reviews_json').val(JSON.stringify(reviews));
  }

  $(document).on('click', '#mrm_add_review_row', function(e) {
    e.preventDefault();
    var rowHtml = '<tr class="mrm-review-row mrm-repeater-row">' +
      '<td><input type="text" class="mrm-input-text review-name" value="Patron Name" style="width:140px;"></td>' +
      '<td><input type="text" class="mrm-input-text review-city" value="Verified Bride • Delhi" style="width:160px;"></td>' +
      '<td><input type="text" class="mrm-input-text review-tag" value="Purchased: Bridal Couture" style="width:180px;"></td>' +
      '<td>' +
        '<select class="mrm-input-select review-rating" style="width:70px;">' +
          '<option value="5" selected>5 ★</option>' +
          '<option value="4">4 ★</option>' +
          '<option value="3">3 ★</option>' +
        '</select>' +
      '</td>' +
      '<td><textarea class="mrm-input-textarea review-quote" rows="2" style="width:260px; min-height:60px;">Exquisite craftsmanship and perfect fitting.</textarea></td>' +
      '<td><button type="button" class="button mrm-btn-danger mrm-remove-row">Remove</button></td>' +
    '</tr>';
    $('#mrm_reviews_table tbody').append(rowHtml);
    serializeReviews();
  });

  $(document).on('input change', '#mrm_reviews_table input, #mrm_reviews_table select, #mrm_reviews_table textarea', function() {
    serializeReviews();
  });

  // Intercept form submit to ensure latest serialization
  $('form.mrm-form').on('submit', function() {
    serializeStores();
    serializeReviews();
  });
});
