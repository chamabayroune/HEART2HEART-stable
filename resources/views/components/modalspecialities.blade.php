
<!-- Modal -->
<div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg">
      <div class="flex justify-end">
        <!-- Icône pour fermer la modal -->
        <svg id="btn-close" class="h-6 w-6 cursor-pointer text-gray-500 hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M11.414 10l3.293-3.293a1 1 0 1 0-1.414-1.414L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414L8.586 10l-3.293 3.293a1 1 0 1 0 1.414 1.414L10 11.414l3.293 3.293a1 1 0 1 0 1.414-1.414L11.414 10z" clip-rule="evenodd" />
        </svg>
      </div>
      <div>
        <!-- Contenu de la modal -->
        <form method="POST" data-aos="zoom-in" action="/AjouteSpecialitie" enctype="multipart/form-data">
                @csrf

                <div class=" flex flex-col lg:flex-row justify-around">
                    <div class="md:flex md:items-center mb-6">

                          
                         <div class="md:w-80 px-10 ">
                                <label class="text-black font-semibold p-4" for="">Specialitie</label>

                             <input class="md:h-12 bg-gray-500 bg-opacity-50 appearance-none  rounded w-full py-2 px-4 text-gray-800 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" name="specialities" >
                           @error('specialities')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                       </div>
                         </div>
                  

                </div>
        
      

             
                <br>
                 <div class="md:flex ">

                    <button class=" text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" id="btnpub" type="text" value="Date of Party" style="background-color:rgba(216, 91, 31, 0.91);">
                         confirmer
                       </button>

                     </div>

                    </form>
      </div>
    </div>
  </div>
</div>
<script>
    // Récupération des éléments HTML
const btnAdd = document.getElementById('btn-add');
const modal = document.getElementById('modal');
const btnClose = document.getElementById('btn-close');

// Ajout d'un gestionnaire d'événement pour le bouton "Add"
btnAdd.addEventListener('click', () => {
  modal.classList.remove('hidden');
});

// Ajout d'un gestionnaire d'événement pour l'icône de fermeture de la modal
btnClose.addEventListener('click', () => {
  modal.classList.add('hidden');
});

</script>