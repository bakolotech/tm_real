{{-- <div class="d-flex justify-content-around search-bolck-logo" style="padding: 114px 0 74px 0; position: sticky; bottom: 40px; z-index: 500" onclick="hideSectionRecherche()">
    <div class="" style="height: 46px; width: 255.56px;"><img id="search_fixed_img" style="width: 100%; height: 100%" src="{{ asset('assets/images/logo.png.svg') }}" alt=""></div>
</div> --}}

<style>
    .search-bolck-logo-bis {
        padding: 0px;
        position: sticky;
        height: 254px;
        /* background: aliceblue; */
        display: flex;
        align-items: center;
        justify-content: center;
        top: 0px;
        margin-top: 0px;
    }
</style>
<section id="section-recherche" >

    <div class="d-flex justify-content-around search-bolck-logo-bis" id="search-block-logo" style="position: sticky" onclick="hideSectionRecherche()">
        <div class="" style="height: 46px; width: 255.56px;">
            <img style="width: 100%; height: 100%" src="{{ asset('assets/images/logo.png.svg') }}" alt="">
        </div>
    </div>

    {{-- <input type="text" placeholder="Recherche annexe" style="width: 200px"> --}}

    <style>

        .tm_fixed_logo {
            background-color: #ffffff; /* Set the background color of the header */
            padding: 10px; /* Add some padding to give the header some space */
            width: 100%; /* Make the header take the full width of the viewport */
            position: fixed; /* Set the header to be fixed */
            top: 0; /* Stick the header to the top of the viewport */
            left: 0; /* Align the header to the left edge of the viewport */
            z-index: 999; /* Set a high z-index to ensure it appears above other elements */
        }

        .tm_fixed_logo img {
            max-height: 50px; /* Set the maximum height of the logo if desired */
        }

    </style>

    <section>
        <div class="d-flex justify-content-around">
            <div class="" style="width: 648px; min-height: 20px">

            </div>
        </div>
    </section>

    <section class="resultat-recherche" id="searchbyText-result" style="position: relative; top: -37px; ">
        <div class="rows" style="display: flex; align-items: flex-start;
        justify-content: center; column-gap: 46px">
            
            <div class="col-md-3d resultat-recherhce-section laissez-nous-deviner-responsive" style="">
                <div class="search-title">
                    <p>Laissez-nous déviner</p>
                </div>
                <div class="resultat-recherhce-section-result" id="resulat-deviner-product">

                </div>
            </div>

            <div class="col-md-4s resiltat-recherhce-section search-middle-zone" style="">
                <div class="search-title">
                    <p>Produits en rayons</p>
                </div>
                <div id="seach-resultat" class="search-middle-zone-result" style="padding-left: 12px">

                </div>
            </div>

            <div class="col-md-5s resiltat-recherhce-section search-historique" >
                <div class="search-title">
                    <p>Historique de recherche</p>
                </div>
                <div class="rowp justify-content-center historique-recherche-container" style="display: flex; flex-wrap: wrap">

                </div>
            </div>
            
            </div>

    </section>

    <section class="resultat-recherche d-none" id="searchbyImage-result" style="position: relative; top: -37px;">
        <div class="rows" style="display: flex; align-items: flex-start;
        justify-content: center; ">

            <div class="row row-img">

            <span class="search-by-image-header">Resultat de la recherche par image</span>

            <div class="wrapper-search" id="image-search-result">

                </div>

            </div>

        </div>
    </section>

</section>

<script>
    function showBySousCat(id_sous_categorie, id_sous_cat) {
        var rayon_id = id_sous_categorie.rayon.id
        var rayon_slug = id_sous_categorie.rayon.slug
        var id_sous_categorie = id_sous_categorie
        console.log('here sous cat id:', id_sous_categorie.rayon.id)
        var url = '/rayon/'+rayon_id+'/'+rayon_slug+'/'+id_sous_cat
        window.location.href = url
    }
</script>
