export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'Rode Kruis - Vluchtelingenplatform',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      {charset: 'utf-8'},
      {name: 'viewport', content: 'width=device-width, initial-scale=1'},
      {hid: 'description', name: 'description', content: ''},
      {name: 'format-detection', content: 'telephone=no'}
    ],
    link: [
      {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'}
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    {src: '~css/main.css', lang: 'css'}
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/tailwindcss
    '@nuxtjs/tailwindcss',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    '@nuxtjs/auth-next',
    '@nuxtjs/i18n'
  ],

  i18n: {
    locales: ['en', 'fr', 'de', 'nl'],
    defaultLocale: 'en',
    skipSettingLocaleOnNavigate: true,
    vueI18n: {
      fallbackLocale: 'en',
      messages: {
        en:{
          "Welcome": "Welcome",
          "This is your hub to manage all the people assigned to you, make sure to notify the person in question if something has changed for them." :
            "This is your hub to manage all the people assigned to you, make sure to notify the person in question if something has changed for them.",
          "Date": "Date",
          "Number of refugees": "Number of refugees",
          "Search": "Search",
          "Refugees": "Refugees",
          "refugee": "refugee",
          "Cards": "Cards",
          "Full name": "Full name",
          "Completed ticks": "Completed ticks",
          "Country of origin": "Country of origin",
          "Unique code": "Unique code",
          "Add": "Add",
          "Profile": "Profile",
          "Logout": "Logout",
          "Firstname": "Firstname",
          "Lastname": "Lastname",
          "Password": "Password",
          "Back": "Back",
          "is added": "is added",
          "Their unique code:": "Their unique code:",
          "Continue": "Continue",
          "Login": "Login",
          "Attendant": "Attendant",
          "attendant": "attendant",
          "Attendants": "Attendants",
          "Refugee": "Refugee",
          "Add refugee": "Add refugee",
          "Add attendant": "Add attendant",
          "Ticks": "Ticks",
          "Max ticks": "Maximum ticks",
          "Kind": "Kind",
          "Reward": "Reward"
        },
        fr: {
          "Welcome": "Bienvenue",
          "This is your hub to manage all the people assigned to you, make sure to notify the person in question if something has changed for them." :
            "C'est votre hub pour gérer toutes les personnes qui vous sont affectées, assurez-vous d'informer la personne en question si quelque chose a changé pour elle.",
          "Date": "Date",
          "Number of refugees": "Nombre de réfugiés",
          "Search": "Chercher",
          "Refugees": "Réfugiés",
          "refugee": "réfugié",
          "Cards": "Cartes",
          "Full name": "Nom et prénom",
          "Completed ticks": "Coches terminées",
          "Country of origin": "Pays d'origine",
          "Unique code": "Code unique",
          "Add": "Ajouter",
          "Profile": "Profil",
          "Logout": "Se déconnecter",
          "Firstname": "Prénom",
          "Lastname": "Nom de famille",
          "Password": "Mot de passe",
          "Back": "Arrière",
          "is added": "est ajouté",
          "Their unique code:": "Leur code unique :",
          "Continue": "Continuer",
          "Login": "Connexion",
          "Attendant": "Préposé",
          "attendant": "préposé",
          "Attendants": "Préposés",
          "Refugee": "Réfugié",
          "Add refugee": "Ajouter réfugié",
          "Add attendant": "Ajouter préposé",
          "Ticks": "Coches",
          "Max ticks": "Maximum Coches",
          "Kind": "Type",
          "Reward": "Récompense"

        },
        de: {
          "Welcome": "Willkommen",
          "This is your hub to manage all the people assigned to you, make sure to notify the person in question if something has changed for them." :
            "Dies ist Ihr hub, um alle Ihnen zugewiesenen Personen zu verwalten. Stellen Sie sicher, dass die betreffende Person benachrichtigt wird, wenn sich für sie etwas geändert hat.",
          "Date": "Datum",
          "Number of refugees": "Anzahl flüchtlinge",
          "Search": "Suche",
          "Refugees": " Flüchtlinge",
          "refugee": "flüchtling",
          "Cards": "Karten",
          "Full name": "Vollständiger Name",
          "Completed ticks": "Abgeschlossene zecken",
          "Country of origin": "Ursprungsland",
          "Unique code": "Einzigartiger code",
          "Add": "Hinzufügen",
          "Profile": "Profil",
          "Logout": "Ausloggen",
          "Firstname": "Vorname",
          "Lastname": "Nachname",
          "Password": "Passwort",
          "Back": "Zurück",
          "is added": "hinzugefügt",
          "Their unique code:": "Ihr einzigartiger code:",
          "Continue": "Weitermachen",
          "Login": "Anmeldung",
          "Attendant": "Begleiter",
          "attendant": "begleiter",
          "Attendants": "Begleiters",
          "Refugee": "Flüchtling",
          "Add refugee": "Flüchtling hinzufügen",
          "Add attendant": "Begleiter hinzufügen",
          "Ticks": "Zecken",
          "Max ticks": "Maximum zecken",
          "Kind": "Nett",
          "Reward": "Belohnen"
        },
        nl:{
          "Welcome": "Welkom",
          "This is your hub to manage all the people assigned to you, make sure to notify the person in question if something has changed for them." :
            "Dit is uw centraal platform om al de mensen te beheren die u zijn toegewezen, zorg er zeker voor dat de persoon in kwestie op de hoogte is als u iets voor hun veranderd heeft.",
          "Date": "Datum",
          "Number of refugees": "Aantal vluchtelingen",
          "Search": "Zoeken",
          "Refugees": " Vluchtelingen",
          "refugee": "vluchteling",
          "Cards": "Kaarten",
          "Full name": "Volledige naam",
          "Completed ticks": "Voltooide vinkjes",
          "Country of origin": "Land van herkomst",
          "Unique code": "Unieke code",
          "Add": "Toevoegen",
          "Profile": "Profiel",
          "Logout": "Uitloggen",
          "Firstname": "Voornaam",
          "Lastname": "Achternaam",
          "Password": "Wachtwoord",
          "Back": "Terug",
          "is added": "is toegevoegd",
          "Their unique code:": "Hun unieke code:",
          "Continue": "Doorgaan",
          "Login": "Aanmelden",
          "Attendant": "Begeleider",
          "attendant": "begeleider",
          "Attendants": "Begeleiders",
          "Refugee": "Vluchteling",
          "Add refugee": "Toevoegen vluchteling",
          "Add attendant": "Toevoegen begeleider",
          "Ticks": "Vinkjes",
          "Max ticks": "Maximum vinkjes",
          "Kind": "Soort",
          "Reward": "Beloning"
        }
      }
    }
    },

    // Axios module configuration: https://go.nuxtjs.dev/config-axios
    axios: {
      baseURL: 'http://localhost:8000/',
      credentials: true
    },

    auth: {
      strategies: {
        'laravelSanctum': {
          provider: 'laravel/sanctum',
          url: 'http://localhost:8000',
          endpoints: {
            login: {
              url: '/api/login'
            },
            loginRefugee:{
              url:'/api/loginRefugee'
            },
            logout: {
              url: '/api/logout'
            },
            refugees: {
              url: '/refugees'
            },
            addRefugee: {
              url: '/refugees/add'
            },
            attendants:{
              url: '/attendants'
            },
            addAttendant: {
              url: '/attendants/add'
            },
            cards: {
              url: '/cards'
            },
            addCard: {
              url: '/cards/add'
            },
            user: {
              url: '/api/user'
            }
          },
          user: {
            property: false
          },
        redirect:{
            login: '/',
            loginRefugee: '/',
            logout: '/login',
            home: '/'
        }
        },
      }
    },

    // Build Configuration: https://go.nuxtjs.dev/config-build
    build: {}
  }
