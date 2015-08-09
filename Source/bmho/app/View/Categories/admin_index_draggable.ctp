<?php
//$javascript->link(array('jquery', 'jquery-ui'), false);

echo $this->Html->script('jquery'); // Include jQuery library
echo $this->Html->script('jquery-ui'); // Include jQuery-ui library

?>
<script>
 $(document).ready(function(){
  //set up the droppable list elements
  $("ul li").droppable({
   accept: ".ui-draggable",
   hoverClass: 'droppable-hover',
   greedy: true,
   tolerance: 'pointer',
   drop: function(ev, ui) {
    var dropEl = this;
    var dragEl = $(ui.draggable);
    
    // get category id
    var parent_id = this.id.substring(9);
    // get category name
    var category_name = $(dragEl.find("span").get(0)).html();
    
    if (!isNaN(parent_id) && category_name.length > 0) {
     var data;
     var url = "categories/";
     // see if we are adding or editing
     if (dragEl.attr("id").substring(0, 9) == "category_") {
      // get the current id
      var id = dragEl.attr("id").substring(9);
      data = { 'data[Category][id]': id, 'data[Category][name]': category_name, 
             'data[Category][parent_id]':

parent_id };
      url += "edit";
     } else {
      data = { 'data[Category][name]': category_name, 'data[Category][parent_id]': parent_id };
      url += "add";
     }
     // post to our page to save our category
     $.post(url, data, function() {
      $.get("categories/index/isAjax:1", function (data) 
           { destroyDraggable(); $("#content").html(data);

setupDraggable(); });
     });
    }
   }
  });
  
  setupDraggable();
 });
 
 function updateDragBox() {
  $($("#ui-draggable").find("span").get(0)).html($("#CategoryName").val());
 }
 
 function setupDraggable() {
  $("#ui-draggable").draggable({
   containment: '#categories',
   stop: function(e,ui) {
    $(this).animate({ left: 0, top:0 }, 500);
    $(this).html('');
   }
  });
  
  $("#category_0").find("li").draggable({
   containment: '#categories',
  });
 }
 
 function destroyDraggable() {
  $("#ui-draggable").draggable('destroy');
  $("#category_0").find("li").draggable('destroy');
 }
</script>
<style>
#categories {
 padding: 1em 0.5em;
 width: 90%;
}
ul li.droppable-hover {
 background-color: #FFF000;
}
#category {
 border: 1px solid #000000;
 margin-top: 1em;
 padding: 1em;
 width: 97%;
}
#ui-draggable {
 background: #FF0000;
 padding: 1em;
 position: relative;
 width: 300px;
}
</style>

breadcrumbs

<h1>Category Hierarchy</h1>
<h2>[ Admin ]</h2>

<ul id="categories">
 <li id="category_0">
  <?php echo $this->element('draw_category', array('data' => $categories)); ?>
 </li>
 <div id="category">
  <p>Enter a category name in the text box below, 
  then drag the object below into the category you wish it to be a part of.</p>
  <div id="ui-draggable"><span></span></div>
  <?php echo $this->Form->input('Category.name', array('onkeyup' => 'updateDragBox()')); ?>
 </div>
</ul>

