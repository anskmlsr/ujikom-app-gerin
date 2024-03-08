var paginate= 1;
var dataExplore =[];
loadMoreData(paginate);
$(window).scroll(function(){
    if($(window).scrollTop()+ $(window).height() >= $(document) .height()){
        paginate++;
        loadMoreData(paginate);
    }
})

function loadMoreData(paginate){
    var urlnya = window.location.href.split("?")[1];
    var parameter = new URLSearchParams(urlnya);
    var cariValue = parameter.get('cari')
   if (cariValue == 'nul'){
    url = window.location.origin + '/getDataExplore/' + '?page='+paginate;
   } else {
    url = window.location.origin + '/getDataExplore?cari='+ cariValue + '&page='+paginate;
   }
    $.ajax({
        url:url,
        type    :"GET",
        datatype:"JSON",
        success: function(e){
            console.log(e)
            e.data.data.map((x)=>{
            var hasilpencarian = x.likefoto.filter(function(hasil){
                return hasil.id_user === e.idUser
            })
            if(hasilpencarian.length <= 0){
                userlike = 0;
            }else{
                userlike =hasilpencarian[0].id_user;

            }
           
                let datanya={
                    id: x.id,
                    judul: x.judul_foto,
                    deskripsi: x.deskripsi_foto,
                    foto: x.url,
                    tanggal:moment(x.created_at).format('DD/MM/YYYY'),
                    jml_comment: x.komentars_count,
                    jml_like:x.likefoto_count,
                    idUserlike:userlike,
                    useractive: e.idUser,


                }
                dataExplore.push(datanya)
                console.log(userlike)
                console.log(e.idUser)

            })
            getExplore()

        },
        eror:function(jqXHR,textStatus,errorThrowm){

        }
    })
}

    const getExplore =()=>{
        $('#exploredata').html('')
        dataExplore.map((x,  i)=>{
            $('#exploredata').append(
                `
                  <div class="flex mt-2 bg-white">
                 <div class="flex flex-col px-2">
                    <a href="/exploredetail/${x.id}">
                        <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                            <img src="/asset/${x.foto}" alt="" class="w-full transition duration-500 ease-in-out hover:scale-105">
                        </div>
                    </a>
                    <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                        <div>
                            <div class="flex flex-col">
                                <div>
                                  ${x.judul}
                                </div>
                                <div class="text-xs text-abuabu">
                                    ${new Date(x.tanggal).toLocaleDateString("id")}
                                </div>
                            </div>
                        </div>
                        <div>
                            <small>${x.jml_comment}</small>
                            <a href= "/exploredetail/${x.id}" class="bi bi-chat-left-text"></a>
                            <small>${x.jml_like}</small>
                            <span class="bi ${x.idUserLike === x.useractive ? 'bi-heart-fill  text-red-800' : 'bi-heart'} bi-heart" onclick="likes(this, ${x.id})"x</span>
                        </div>
                    </div>
                </div>
            </div>      
            `
            
            )
        })
    
    }


    function likes(txt, id){
        $.ajax({
            url:window.location.origin +'/likefotos',
            dataType: "JSON",
            type: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                idfoto: id,
            
            },
            success:function(res){
                console.log(res)
                location.reload()
            },
            eror:function(jqXHR,textStatus,errorThrowm){
                alert('gagal');

            }

        })
    }


