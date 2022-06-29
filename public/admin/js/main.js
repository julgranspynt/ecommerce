$('#create-blog-form').on('submit',addProductEvent);

async function addProductEvent(e){
    e.preventDefault();

    const formData = new FormData(e.target);
    formData.set('createBtn', true);


    try {
        const response = await fetch('create.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

    $('#form-messages-success').html(data['success']);
    $('#form-messages-title').html(data['error1']);
    $('#form-messages-description').html(data['error2']);
    $('#form-messages-price').html(data['error3']);
    $('#form-messages-stock').html(data['error4']);
    $('#form-messages-image').html(data['error']);

    
} catch(error) {
        console.log(error);
    }
};





