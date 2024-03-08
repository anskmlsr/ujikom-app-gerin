var segmentTerakhir = window.location.href.split('/').pop();
console.log('segmen : ' + segmentTerakhir )

$.ajax({
    url: window.location.origin +'/exploredetail/'+segmentTerakhir+'/getdatadetail',
    type:"GET",
    datatype:"JSON",
    success: function(res){
        console.log(res)
        $('#fotodetail').prop('src', '/asset/' +res.data.url)
        $('#judulfoto').html(res.data.judul_foto)
        $('#deskripsifoto').html(res.data.deskripasi_foto)
        $('#username').html(res.user.nama_lengkap)
        ambilkomentar()
    },
    eror: function(jqXHR,textStatus,errorThrowm){
        alert('gagal')
        }
})


function ambilkomentar(){
    $.getJSON(window.location.origin + '/exploredetail/getComment/' + segmentTerakhir, function(res){
        console.log(res)
        if(res.data.length === 0){
            $('#listkomentar').html('<div>belum ada komentar</div>')
        }else{
            comment= []
            res.data.map((x)=>{
                let datacommentar = {
                    // idUser:x.user.id,
                    // pengirim: x.user.nama_lengkap,
                    waktu:x.created_at,
                    isikomentar:x.isi_komentar,
                    // potopengirim:x.user.picture,
                }
                comment.push(datacommentar);
            })
            tampilkankomentar()


        }

    })
}
const tampilkankomentar =()=>{
    $('#listkomentar').html('')
    comment.map((x, i)=>{
        $('#listkomentar').html(`
        <div class="flex flex-row justify-start mt-4">
        <div class="w-1/4">
        </div>
        <div class="overflow-hidden flex flex-col mr-2">
        <small class="text-xs text-abuabu">${new Date(x.waktu).toLocaleDateString("id")}</small>
        </div>
        
        <h5 class="text-sm">${x.isikomentar}</h5>
        </div>`)
        
    })
    
}

// <h5 class="text-sm">${x.pengirim}</h5>
// <img src="/asset/${x.potopengirim}" class="w-8 h-auto" alt="">
function kirimkankomentar() {
    $.ajax({
        url: window.location.origin + "/detailfoto/kirimkankomentar/",
        type: "POST",
        datatype:"JSON",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: segmentTerakhir,
            isi_komentar: $('input[name="isi_komentar"]').val(),
        },
        success: function (res) {
            console.log(res)
            $('input[name="isi_komentar"]').val("");
        },
        eror: function(jqXHR,textStatus,errorThrowm){
            alert("gagal mengirim komentar");
    },

});

}

