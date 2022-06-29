$('#deleteForm').on('submit', deleteAccount); 
    $('#updateModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var title = button.data('title'); 
    var description = button.data('description'); 
    var price = button.data('price');  
    var stock = button.data('stock'); 
    var id = button.data('id');    

    
    
    
    var modal = $(this)
    modal.find('.modal-body input[name="title"]').val(title);
    modal.find('.modal-body input[name="description"]').val(description);
    modal.find('.modal-body input[name="price"]').val(price);
    modal.find('.modal-body input[name="stock"]').val(stock);
    modal.find('.modal-body input[name="id"]').val(id);
  })

document.querySelector('#search-form').addEventListener('submit', addSearchResult);


async function addSearchResult(e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    console.log(formData);

    formData.set('matchProduct', true);

    
    try {
        
        const response = await fetch('api.php', {
            method: 'POST', body: formData
        });
        const data = await response.json();
        console.log(data);

        submitSearch(data['products']);
    }
        
    catch(error) {
       console.log(error);
   }
    var product = "";
    function submitSearch(products){
        html="";
    
            for (product of products)['products'] 
            html+=`
            
      
   
            <form id="search-form" method="POST">

            </form>
          
                    <b>Id: </b>${product['id']};<br><br>
                    <b>Title: </b>${product['title']};<br><br>
                    <b>Price: </b>${product['price']};<br><br>
                    <b>Description: </b>${product['description']};<br><br>
                    <b>Stock: </b>${product['stock']};<br><br>
                    <img src="./admin/${product['img_url']}" width="200px"><br><br>
                    <a class="button botton-width" href="./products.php">Go to products</a>

            </div>

           `  
            }
            $('#submitSearch').html(html);
        }
        

        async function deleteAccount(e) {
            e.preventDefault();
        
            const formData = new FormData(e.target);
            formData.set('deleteBtn', true);
        
            try {
                await fetch('../src/app/API.php', {
                    method: 'POST',
                    
                    body: formData
                });
        
                window.location.replace("login.php?deleted");
                
            } catch(error) {
                console.log(error);
            }
        }