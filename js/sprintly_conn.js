//You'll want to do something more secure than this, but you get the idea
sprintly_api.auth.email = 'shilpivyas7@gmail.com';
sprintly_api.auth.api_key = 'HdspRBAEetJzeMTW7SgUPaU8kRPqJNyB'; //SdfQPPhNQzMquZLWcMhQGThvNVS44JnY;
var new_item;

var products = sprintly_api.product.list();
var selected_product = 0; // Possibly derived from a select list of products
sprintly_api.product.selected = products[selected_product].id;

//get all items
var item_list = sprintly_api.item.list();