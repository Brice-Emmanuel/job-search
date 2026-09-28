<!-- WIDGET CHATBOT JOBSEARCH -->
<div id="chatbot-widget" class="fixed bottom-6 right-6 z-[9999] font-sans">

    <!-- ============================= -->
    <!-- BOUTON FLOTTANT -->
    <!-- ============================= -->
    <button
        id="chatbot-toggle"
        type="button"
        aria-label="Ouvrir l'assistant JobSearch"
        class="w-16 h-16 bg-blue-600 hover:bg-blue-700 rounded-full shadow-2xl flex items-center justify-center overflow-hidden transition-transform hover:scale-105 p-0 border-0"
    >

        <!-- Icône personnalisée -->
        <img
            id="chatbot-icon-open"
            src="{{ asset('images/icondialogue.png') }}"
            alt="Assistant JobSearch"
            class="w-full h-full object-cover rounded-full block"
        >

        <!-- Icône fermeture -->
        <i
            id="chatbot-icon-close"
            class="fa-solid fa-xmark text-2xl text-white hidden"
        ></i>

    </button>


    <!-- ============================= -->
    <!-- FENÊTRE DE CHAT -->
    <!-- ============================= -->
    <div
        id="chatbot-panel"
        class="hidden absolute bottom-20 right-0 w-[340px] h-[480px] bg-white rounded-3xl shadow-2xl border border-slate-200 flex flex-col overflow-hidden"
    >

        <!-- ============================= -->
        <!-- EN-TÊTE -->
        <!-- ============================= -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-5 py-4 flex items-center gap-3">

            <!-- Petite icône dans l'en-tête -->
            <div class="w-9 h-9 bg-white/20 rounded-full flex items-center justify-center overflow-hidden">

                <img
                    src="{{ asset('images/icondialogue.png') }}"
                    alt="Assistant"
                    class="w-full h-full object-cover rounded-full"
                >

            </div>

            <div>
                <p class="font-bold text-sm leading-none">
                    Assistant JobSearch
                </p>

                <p class="text-[11px] text-blue-100 mt-1">
                    En ligne
                </p>
            </div>

        </div>


        <!-- ============================= -->
        <!-- MESSAGES -->
        <!-- ============================= -->
        <div
            id="chatbot-messages"
            class="flex-1 overflow-y-auto px-4 py-4 space-y-3 bg-slate-50"
        ></div>


        <!-- ============================= -->
        <!-- ZONE DE SAISIE -->
        <!-- ============================= -->
        <form
            id="chatbot-form"
            class="border-t border-slate-200 p-3 flex items-center gap-2 bg-white"
        >

            <input
                id="chatbot-input"
                type="text"
                autocomplete="off"
                maxlength="500"
                placeholder="Écrivez votre message..."
                class="flex-1 text-sm px-4 py-2.5 rounded-full border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:bg-slate-100"
            >

            <button
                type="submit"
                aria-label="Envoyer le message"
                class="w-10 h-10 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition flex-shrink-0 disabled:opacity-50"
            >
                <i class="fa-solid fa-paper-plane text-xs"></i>
            </button>

        </form>

    </div>

</div>


<script>
(function () {

    // ==============================
    // ÉLÉMENTS DU CHAT
    // ==============================

    const toggleBtn = document.getElementById('chatbot-toggle');
    const panel = document.getElementById('chatbot-panel');

    const iconOpen = document.getElementById('chatbot-icon-open');
    const iconClose = document.getElementById('chatbot-icon-close');

    const messagesBox = document.getElementById('chatbot-messages');
    const form = document.getElementById('chatbot-form');
    const input = document.getElementById('chatbot-input');

    const submitBtn = form.querySelector('button[type="submit"]');

    const chatUrl = "{{ route('chatbot.message') }}";

    const csrfToken =
        document.querySelector('meta[name="csrf-token"]')?.content;

    let welcomed = false;
    let sending = false;


    // ==============================
    // OUVRIR / FERMER LE CHAT
    // ==============================

    toggleBtn.addEventListener('click', function () {

        const isHidden = panel.classList.contains('hidden');

        panel.classList.toggle('hidden');

        iconOpen.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');


        // Premier message automatique
        if (isHidden && !welcomed) {

            welcomed = true;

            addMessage(
                "Bonjour 👋 Je suis l'assistant JobSearch. Posez-moi vos questions sur le site !",
                'bot'
            );

            setTimeout(function () {
                input.focus();
            }, 100);
        }

    });


    // ==============================
    // AJOUTER UN MESSAGE
    // ==============================

    function addMessage(text, from) {

        const wrapper = document.createElement('div');

        wrapper.className =
            from === 'user'
                ? 'flex justify-end'
                : 'flex justify-start';


        const bubble = document.createElement('div');

        bubble.className =
            from === 'user'
                ? 'bg-blue-600 text-white text-sm px-4 py-2.5 rounded-2xl rounded-br-sm max-w-[80%]'
                : 'bg-white text-slate-800 text-sm px-4 py-2.5 rounded-2xl rounded-bl-sm max-w-[80%] shadow-sm border border-slate-200 whitespace-pre-line';


        bubble.textContent = text;

        wrapper.appendChild(bubble);

        messagesBox.appendChild(wrapper);

        messagesBox.scrollTop = messagesBox.scrollHeight;
    }


    // ==============================
    // INDICATEUR "..."
    // ==============================

    function addTypingIndicator() {

        const wrapper = document.createElement('div');

        wrapper.id = 'chatbot-typing';

        wrapper.className = 'flex justify-start';

        wrapper.innerHTML = `
            <div class="bg-white text-slate-400 text-sm px-4 py-2.5 rounded-2xl rounded-bl-sm shadow-sm border border-slate-200">
                ...
            </div>
        `;

        messagesBox.appendChild(wrapper);

        messagesBox.scrollTop = messagesBox.scrollHeight;
    }


    // ==============================
    // SUPPRIMER "..."
    // ==============================

    function removeTypingIndicator() {

        const typing =
            document.getElementById('chatbot-typing');

        if (typing) {
            typing.remove();
        }
    }


    // ==============================
    // BLOQUER / DÉBLOQUER ENVOI
    // ==============================

    function setSending(state) {

        sending = state;

        input.disabled = state;

        submitBtn.disabled = state;

        if (!state) {
            input.focus();
        }
    }


    // ==============================
    // ENVOI DU MESSAGE
    // ==============================

    form.addEventListener('submit', async function (e) {

        e.preventDefault();

        const message = input.value.trim();

        if (!message || sending) {
            return;
        }


        // Afficher le message utilisateur
        addMessage(message, 'user');

        input.value = '';

        setSending(true);

        addTypingIndicator();


        let reply;


        try {

            const res = await fetch(chatUrl, {

                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },

                body: JSON.stringify({
                    message: message
                }),

            });


            // ==============================
            // LIMITE DE REQUÊTES
            // ==============================

            if (res.status === 429) {

                reply =
                    "Vous envoyez beaucoup de messages à la suite. Patientez une minute puis réessayez 🙏";

            }


            // ==============================
            // SESSION EXPIRÉE
            // ==============================

            else if (res.status === 419) {

                reply =
                    "Votre session a expiré. Rechargez la page puis réessayez.";

            }


            // ==============================
            // AUTRE ERREUR SERVEUR
            // ==============================

            else if (!res.ok) {

                reply =
                    "Désolé, une erreur est survenue. Réessayez dans un instant.";

            }


            // ==============================
            // RÉPONSE DU CHATBOT
            // ==============================

            else {

                const data = await res.json();

                reply =
                    data.response ||
                    data.reply ||
                    "Désolé, une erreur est survenue.";

            }

        } catch (err) {

            console.error(
                'Erreur chatbot :',
                err
            );

            reply =
                "Désolé, impossible de joindre le serveur. Vérifiez votre connexion.";
        }


        // Supprimer l'indicateur
        removeTypingIndicator();


        // Afficher réponse
        addMessage(reply, 'bot');


        // Réactiver
        setSending(false);

    });

})();
</script>

Pour que l'image remplisse vraiment le cercle

Vérifie surtout que ton fichier est bien ici :

job-search/
└── public/
    └── images/
        └── icondialogue.png

