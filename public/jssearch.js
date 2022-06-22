    
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
            <table>
      
   
            <form id="search-form" method="POST">

            </form>
            </div>
            </div>
            <thead>
                <tr>
                    <b><th>Id:</th></b>
                    <b><th>Title:</th></b>
                    <b><th>Price:</th></b>
                    <b><th>Description:</th></b>
                    <b><th>Stock:</th></b>
                  </tr>
            </thead>
            <tbody>
            <tr>
                <td>${product['id']}</td>
                <td>${product['title']}</td>
                <td>${product['price']}</td>
                <td>${product['description']}</td>
                <td>${product['stock']}</td>
              
           
            </div>
            </tr>
            </tbody>
            <tbody>
                <td><img src="${product['img_url']}" width="150px"></td>
                <td><a href="${product['id']}">Go to product</a></td>
            </tbody>
            </table>
           `  
            }
            $('#submitSearch').html(html);
        }
        