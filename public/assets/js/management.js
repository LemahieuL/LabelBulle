$(function() {
   $('.deleteCollection').click(function() {
      $('#deleteCollectionId').val($(this)[0].dataset.collectionId);
   });
});
