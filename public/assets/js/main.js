var url='http://localhost:8000/find';
var query={city:'',name:''};

$('#location').change(function(e){
    query.city=this.value;
});

$('#doc_name').keyup(function(e){
    query.name=this.value;
    if(query.name!==''){
        $.getJSON(url,query).done((res)=>{
            $('#doc_name_suggest').text(res.data);
        });
    }
});

$('#doc_name_suggest').click(()=>{
    let val=$('#doc_name_suggest').text();
   $('#doc_name').val(val);
});

