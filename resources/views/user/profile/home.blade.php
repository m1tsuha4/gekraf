@extends('user.layouts.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_profile.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="image-profile">
        <img src="{{ asset('img/home_profile.png') }}" alt="">
    </div>
    <div class="container">
        {{-- <div class="container">
            <img src="{{ asset('img/home_profile.png') }}" alt="">
        </div> --}}
        <div class="about-us batas-kanan-kiri atas">
            <div class="gambar">
                <div class="cover-gambar">
                    <img src="{{ asset('img/pelantikan.png') }}" alt="">
                </div>
            </div>
            <div class="text" style="margin-top: auto">
                <h2>Gerakan Ekonomi Kreatif</h2>
                <br>
                <br>
                <p>Gerakan Ekonomi Kreatif Nasional (GeKrafs) adalah sebuah organisasi komunitas dalam bidang pengembangan ekosistem ekonomi kreatif di Indonesia. GeKrafs digagas oleh Kawendra Lukistian, Sandiaga Uno, Erwin Soerjadi, Yanti Adeni, Laja Lapian, Ardian Perdana Putra dan beberapa pelaku industri kreatif lainnya di Jakarta pada 22 Januari 2019. </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="image-profile batas-kanan-kiri atas bawah">
            <img src="{{ asset('img/Billboard.png') }}" alt="">
            {{-- <embed src="{{ asset('img/sk.pdf') }}" type="application/pdf" width="100%" height="600px" /> --}}
        </div>
    </div>

    <div class="article">
        <h1 style="text-align:center; margin-bottom: 30px">Program Gekrafs (4L)</h1>
    </div>

    <div class="about-us batas-kanan-kiri">
        <div class="text" style="margin-top: auto; padding: 20px">
            <h2>Literasi Ekonomi Kreatif</h2>
            <br>
            <br>
            <p>Literasi ekonomi kreatif mencakup pemahaman tentang bagaimana sektor ekonomi yang berbasis pada kreativitas, keterampilan, dan bakat individu dapat memberikan kontribusi signifikan terhadap perekonomian. Ini melibatkan berbagai industri seperti seni, musik, film, fashion, dan desain yang mendorong inovasi dan mendorong pertumbuhan ekonomi yang berkelanjutan. Meningkatkan literasi dalam bidang ini penting untuk mendorong masyarakat memahami potensi ekonomi kreatif dan cara memanfaatkannya secara maksimal. </p>
        </div>
        <div class="text" style="margin-top: auto; padding: 20px">
            <h2>Luasnya Lapangan Kerja</h2>
            <br>
            <br>
            <p>Ekonomi kreatif menawarkan peluang kerja yang luas dan beragam, mencakup berbagai sektor seperti desain grafis, perfilman, musik, arsitektur, dan banyak lagi. Dengan perkembangan teknologi dan digitalisasi, semakin banyak lapangan kerja baru yang muncul dalam industri ini. Peningkatan jumlah peluang kerja di sektor ekonomi kreatif membantu mengurangi tingkat pengangguran dan mendorong pertumbuhan ekonomi yang inklusif. </p>
        </div>
    </div>
    <div class="about-us batas-kanan-kiri">
        <div class="text" style="margin-top: auto; padding: 20px">
            <h2>Lestarinya Budaya dan Produk Kreatif Indonesia</h2>
            <br>
            <br>
            <p>Ekonomi kreatif berperan penting dalam melestarikan budaya dan produk kreatif Indonesia. Dengan mengangkat dan mempromosikan warisan budaya lokal melalui produk-produk kreatif, kita dapat menjaga tradisi dan identitas bangsa. Industri kreatif seperti batik, kerajinan tangan, kuliner tradisional, dan seni pertunjukan memainkan peran krusial dalam melestarikan dan memperkenalkan kekayaan budaya Indonesia kepada dunia. </p>
        </div>
        <div class="text" style="margin-top: auto; padding: 20px">
            <h2>Lahirnya Pengusaha Baru</h2>
            <br>
            <br>
            <p>Sektor ekonomi kreatif mendorong lahirnya banyak pengusaha baru yang inovatif dan kreatif. Dengan adanya peluang dan dukungan yang tepat, individu dapat mengembangkan ide-ide kreatif mereka menjadi usaha yang sukses. Hal ini tidak hanya memberikan dampak positif pada perekonomian tetapi juga menciptakan ekosistem yang mendukung pertumbuhan kewirausahaan dan inovasi di Indonesia. </p>
        </div>
    </div>
    <div class="article">
        <h1 style="text-align:center; margin-bottom: 20px">Seputar Gekrafs</h1>
        
    </div>
    <div class="batas-kanan-kiri">
        <button type="button" class="collapsible">MISI DAN FOKUS UTAMA</button>
        <div class="content">
          <p>Gekrafs berkomitmen untuk menciptakan lingkungan yang mendukung pertumbuhan ekonomi kreatif di Indonesia. Organisasi ini memperjuangkan hak dan perlindungan hukum bagi para pelaku ekonomi kreatif, serta mempromosikan keberagaman budaya dan seni Indonesia. Gekrafs secara aktif mendorong inovasi, pendidikan, dan kolaborasi antara para pelaku ekonomi kreatif, pemerintah, dan sektor swasta.</p>
        </div>
        <button type="button" class="collapsible">17 SUB SEKTOR EKONOMI KREATIF</button>
        <div class="content">
          <p>Gekrafs berfokus pada 17 sub sektor ekonomi kreatif yang mencakup seni pertunjukan, seni visual, desain, mode, arsitektur, film dan animasi, musik, permainan, penerbitan, radio dan televisi, kuliner, kerajinan tangan, kerajinan digital, seni digital, seni pertunjukan, seni rupa, seni sastra, serta seni rakyat. Organisasi ini menyadari bahwa keberagaman ini adalah aset berharga yang mendefinisikan kekayaan budaya Indonesia.</p>
        </div>
        <button type="button" class="collapsible">VISI GEKRAFS MENUJU INDONESIA EMAS 2045</button>
        <div class="content">
          <p>Visi Gekrafs adalah menciptakan ekosistem yang berkelanjutan bagi ekonomi kreatif di Indonesia, menjadikannya sebagai salah satu pilar menuju Indonesia Emas 2045. Mereka berharap agar para pelaku ekonomi kreatif dapat terus berkembang, berkontribusi pada perekonomian nasional, dan menjadi duta budaya Indonesia yang kreatif dan berdaya saing di tingkat global.
          </p>
          <br>
          <p>
            Sebagai garda terdepan dalam mendukung, mempromosikan, dan melindungi ekonomi kreatif, Gekrafs membawa harapan dan inspirasi bagi ribuan individu yang memajukan kekayaan budaya, seni, dan inovasi di Indonesia, sehingga turut mengantarkan bangsa ini menuju cita-cita besar “Indonesia Emas 2045.”
          </p>
        </div>
    </div>
    
    

    @include('user.layouts.footer')
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
            content.style.maxHeight = null;
            } else {
            content.style.maxHeight = content.scrollHeight + "px";
            }
        });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
