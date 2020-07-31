@extends('apps/app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-2 col-lg-1 pb-1">
            <a href="javascript:void(0)" onclick="window.history.back()">
                <div class="back text-center">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                        <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                </div>
            </a>
        </div>
        <div class="col-sm-10 col-lg-11">
            <div class="header">
                <h3 class="h4 py-2 text-center text-light">Diagnosa Covid-19</h3>
            </div>
        </div>
    </div>
</div>
<div class="container content mt-5">
    {{-- QUESTION --}}
    <div class="row justify-content-around question">
        <div class="col-md-8">
            <div class="card mb-4 bg-light">
                <div class="card-body text-center py-5">
                    <h5 class="card-title font-weight-bold"></h5>
                    <i><small class="text-danger"></small></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around answer">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body py-2 text-center">
                    <input class="yes" type="radio" name="answer" value="1" id="1">
                    <label for="1" class="card-title mb-0">
                        Ya
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body py-2 text-center">
                    <input class="no" type="radio" name="answer" value="0" id="0">
                    <label for="0" class="card-title mb-0">
                        Tidak
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <button type="button" class="btn-next btn btn-success btn-block rounded-lg">SELANJUTNYA</button>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function ajax(){
            let xhttp = new XMLHttpRequest();
            xhttp.addEventListener('load', ajaxCompleted);
            xhttp.addEventListener('error', ajaxFailed);
            xhttp.open("get", `{{route('diagnosa_all')}}`, true);
            xhttp.send();
        }
        let el_question = document.querySelector('.question h5');
        let el_result = document.querySelector('.question .card-body');
        let el_question_desc = document.querySelector('.question small');
        let el_btn_next = document.querySelector('.btn-next');
        let el_radio_yes = document.querySelector('.yes');
        let el_radio_no = document.querySelector('.no');
        let answer = [];
        function ajaxCompleted(){
            let json = JSON.parse(this.responseText);
            if (json.status == 'success') {
                let current_index = 0;
                let next_index = 0;
                let data_length = Object.keys(json.data).length;
                question(json.data, current_index);
                
                el_btn_next.addEventListener('click', function(e){
                    if (!el_radio_yes.checked && !el_radio_no.checked) {
                        return alert('Jawaban harus dipilih');
                    }
                    if (el_radio_yes.checked) {
                        answer.push(json.data[current_index]);
                    } 
                    next_index++;
                    if (next_index < data_length) {
                        question(json.data, next_index);
                        el_radio_yes.checked = false;
                        el_radio_no.checked = false;
                        // console.log(data_length);
                        // console.log(current_index);
                        current_index++;
                    }else{
                        // console.log(answer);
                        document.querySelector('.answer').style.visibility = "hidden";
                        el_btn_next.style.visibility = "hidden";
                        result(answer);
                    }
                });

            }
        }
        function ajaxFailed(evt) {
            console.log("An error occurred while transferring the file.");
        }
        function question(data, index){
            el_question.innerHTML = `Apakah anda merasakan ${data[index].gejala}?`;
            el_question_desc.innerHTML = `${data[index].deskripsi}`;
        }
        
        function result(answer){
            let cf = 0;
            let gejala = '';
            console.log(answer);
            let answer_length = Object.keys(answer).length;
            if (answer_length > 1) {
                for (let i = 0; i < answer_length - 1; i++) {
                    if (i==0) {
                        cf = answer[i].nilai_mb - answer[i].nilai_md;
                    }
                    let cf_n = answer[i+1].nilai_mb - answer[i+1].nilai_md;
                    cf = cf + (cf_n * (1-cf));                 
                    
                }
            }else if(answer_length == 1){
                 cf = answer[0].nilai_mb - answer[0].nilai_md;
            }
            // cf = Math.floor(cf);
            cf = cf.toFixed(2);
            answer.forEach(element => {
                gejala += `<li>${element.gejala}</li>`    
            });
            el_result.innerHTML = `
            <h5>Hasil Diagnosa</h5>
            <b>Gejalah yang dialami</b>
            <ol class="text-left">
                ${gejala}
            </ol>
            <h6>Nilai CF Akhir : ${cf}</h6>
            <p>Persentase : ${cf * 100}%</p>
            
            <p style="text-align: justify;text-justify: inter-word;">
                Protokol Isolasi Mandiri yang Perlu Diterapkan
Bila Anda memiliki gejala atau kontak erat dengan orang yang memiliki gejala, Anda harus bertanggung jawab untuk melakukan isolasi mandiri di rumah, setidaknya selama 14 hari. Berikut ini adalah hal-hal yang perlu Anda lakukan selama isolasi mandiri di rumah sesuai anjuran pemerintah:

1. Tidak beraktivitas di luar rumah
Apabila sedang dalam isolasi, Anda tidak boleh keluar rumah atau pergi ke tempat-tempat umum walaupun untuk bekerja. Jika memungkinkan, bekerjalah dari rumah selama isolasi. Namun, apabila sakit, Anda dianjurkan untuk beristirahat dulu untuk sementara waktu hingga pulih.

Bila tadinya Anda memiliki gejala dan sembuh dalam waktu kurang dari 14 hari, Anda tetap harus tinggal di rumah dan menunggu hingga masa isolasi selesai. Sebisa mungkin, hindari menerima tamu.

Apabila selama masa isolasi ada keperluan ke luar rumah, seperti membeli makanan ataupun obat-obatan, mintalah orang lain yang tidak sedang menjalani isolasi untuk melakukannya. Anda juga dapat memanfaatkan aplikasi layanan online untuk memenuhi kebutuhan sehari-hari.

2. Hindari kontak dekat dengan orang yang tinggal serumah
Selama di rumah, Anda disarankan untuk berada di kamar yang terpisah dengan penghuni rumah lainnya. Kamar disarankan memiliki ventilasi dan pencahayaan yang baik.

Meski begitu, bukan berarti Anda harus selalu berada di dalam kamar tersebut dan orang lain tidak boleh masuk. Hal ini diperbolehkan, asalkan tetap dalam batasan tertentu.

Saat sedang berada dalam satu ruangan dengan penghuni rumah lainnya, jaga jarak atau lakukan physical distancing, terutama dengan orang yang rentan terhadap COVID-19, seperti lansia, pemilik penyakit kronis, dan ibu hamil. Jaga jarak setidaknya sejauh 1 meter dan hindari bicara berhadap-hadapan dengan orang lain lebih dari 15 menit.

3. Pakai masker
Meski di rumah, Anda tetap disarankan untuk mengenakan masker, yaitu masker jenis surgical mask, guna mencegah penularan kepada keluarga atau orang yang berada dalam satu rumah dengan Anda.

Apabila tidak ada masker, Anda disarankan untuk tidak berlama-lama dalam satu ruangan dengan penghuni rumah yang lain. Bila salah satu penghuni rumah masuk ke dalam kamar isolasi, misalnya untuk mengantarkan makanan, Anda disarankan untuk memakai masker kain untuk mengurangi risiko penularan.

4. Gunakan perlengkapan terpisah
Selama menjalani isolasi mandiri, gunakan piring, sendok, garpu, dan gelas terpisah. Perlengkapan mandi, seperti handuk dan sikat gigi, juga harus terpisah dari penghuni rumah lainnya.

Selain itu, sediakan tempat sampah atau kantung plastik khusus untuk membuang tisu yang Anda gunakan untuk batuk, bersin, dan membersihkan mulut atau hidung. Anda juga disarankan untuk rutin membersihkan permukaan benda yang sering disentuh, seperti wastafel, gagang pintu, atau telepon, dengan cairan disinfektan.

5. Terapkan perilaku hidup bersih dan sehat
Cucilah tangan Anda dengan air dan sabun secara rutin. Jangan lupa minum banyak air, setidaknya 8 gelas sehari, serta konsumsi makanan yang bergizi. Anda juga disarankan untuk berjemur dan melakukan olahraga ringan di bawah sinar matahari setiap pagi selama 15–30 menit agar tubuh Anda lebih bugar dan lebih cepat sembuh.

Pantau kesehatan Anda secara mandiri, yaitu dengan mengukur suhu tubuh setiap hari dan mengamati gejala yang muncul. Bila demam, Anda bisa mengonsumsi obat yang mengandung paracetamol sesuai aturan pakai yang tertera pada kemasan obat.

Selain itu, tetaplah menjalin hubungan dengan anggota keluarga dan teman melalui telepon, video call, atau media sosial. Jangan sampai isolasi di rumah membuat Anda merasa tersisih dan kesepian.

6. Hubungi rumah sakit
Apabila di tengah masa isolasi muncul keluhan baru atau keluhan yang Anda alami jadi memberat, misalnya demam tinggi disertai batuk terus-menerus dan sulit bernapas, segera hubungi rumah sakit atau hotline COVID-19 untuk mendapatkan perawatan.

Agar orang lain tidak tertular, Anda disarankan untuk tetap berada di rumah. Bila memang diperlukan, rumah sakit akan mengirim ambulans khusus untuk menjemput Anda.

Isolasi di rumah bisa menjadi hal yang berat bagi sebagian orang. Namun, cara sederhana ini efektif untuk melindungi Anda, keluarga dan orang-orang di sekitar Anda, bahkan seluruh masyarakat Indonesia dari COVID-19.

Terlepas dari ada atau tidaknya gejala dan kontak dengan orang yang menderita atau dicurigai menderita COVID-19, setiap orang disarankan untuk tinggal di rumah dan membatasi aktivitas di luar rumah, terutama yang melibatkan banyak orang. Bila memungkinkan, mintalah pilihan untuk bekerja atau belajar dari rumah.

Pasalnya, virus Corona atau SARS-CoV-2 dapat menyebar bahkan dari orang yang tidak merasakan gejala. Jadi, seseorang bisa saja tertular atau menularkan virus ini tanpa menyadarinya.

Bila masih ragu apakah Anda perlu melakukan isolasi mandiri di rumah, berkonsultasilah dengan dokter melalui chat di aplikasi Alodokter. Selain itu, Anda juga bisa melakukan konsultasi di aplikasi ini mengenai masalah kesehatan apa pun, baik yang terkait COVID-19 maupun yang tidak, sehingga Anda tidak perlu keluar rumah.
            </p>

            <a href="{{route('diagnosa')}}" class="btn btn-info rounded-pill">Diagnosa Ulang</a>
            `;
        }

        function certaintyFactor(element, i, array){
            
        }

        ajax();
    </script>
@endsection