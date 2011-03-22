if (Drupal.jsEnabled) {
  $(document).ready(function(){
 
    $('form#search-theme-form input.form-text').example('Search');
    $('form#search-box input.form-text').example('Search');
    $('form#search-block-form input.form-text').example('Search');    
    $('form#islandora-solr-simple-search-form input.form-text').example('Search');    
    $('form#ilives-solr-simple-search-block-form input.form-text').example('Search');    
    $('form#google-cse-searchbox-form input.form-text').example('Search');
    $('form#ilives-solr-search-block-form input.form-text').example('');
  });
}