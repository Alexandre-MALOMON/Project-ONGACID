const forms = document.querySelectorAll('#form-js');

forms.forEach(form =>{
    form.addEventListener('submit', function(e){
        e.preventDefault();
         
        const url = this.getAttribute('action');
        const token = document.querySelector('meta[name="csrf-token"]').content; 
        const participantId = this.querySelector('#id_participant').value;
        const status = this.querySelector('#status').value;
        const count = this.querySelector('#count-js');

        fetch(url,{
            headers: {
                'Content-type': 'application/json',
                'X-CSRF-TOKEN': token
            },

            method: 'post',
            body: JSON.stringify({
                id: participantId, status
            })
        }).then(response =>{
            response.json().then(data =>{
                count.innerHTML = data.count;
            })
        }).catch(error => {
            console.log(error)
          
        });

    });
});
