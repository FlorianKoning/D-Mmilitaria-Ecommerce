<section>
    <div class="bg-white py-12 sm:py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
            <h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Algemene Voorwaarden – DBM Militaria</h1>
            <div class="mt-10 flex flex-col gap-10 w-max-w-xl text-base/7 text-gray-700 lg:max-w-none">
                {{-- Row 1 --}}
                <div class="flex flex-row justify-between">
                    <p class="w-full">
                        <span class="font-semibold">1. Wie zijn wij?</span>
                        <br>
                        &emsp;DBM Militaria is een geregistreerd bedrijf gespecialiseerd in de verkoop van originele militaire collectibles.
                        <br>
                        &emsp;Contact: <span class="font-semibold">{{ $business->business_email }}</span>
                        <br>
                        &emsp;KvK-nummer: <span class="font-semibold">{{ $business->kvk_number }}</span>
                        <br>
                        &emsp;BTW-nummer: <span class="font-semibold">{{ $business->btw_number }}</span>
                        <br>
                        &emsp;Vestigingsadres: <span class="font-semibold">{{ $business->business_address }}</span>
                    </p>
                </div>

                {{-- Row 2 --}}
                <div class="flex flex-row justify-between">
                    <p class="w-full">
                        <span class="font-semibold">2. Persoonsgegevens die wij verwerken</span>
                        <br>
                        &emsp;<span class="font-semibold">Wij verwerken je persoonsgegevens wanneer je:</span>
                        <br>
                        &emsp;&emsp;-   Een bestelling plaatst
                        <br>
                        &emsp;&emsp; -   Een account aanmaakt (optioneel)
                        <br>
                        &emsp;&emsp;-   Contact met ons opneemt via e-mail of het contactformulier
                        <br>
                        &emsp;<span class="font-semibold">Wij kunnen de volgende gegevens verwerken:</span>
                        <br>
                        &emsp;&emsp;-   Voor- en achternaam
                        <br>
                        &emsp;&emsp;-   Adresgegevens
                        <br>
                        &emsp;&emsp;-   Telefoonnummer (optioneel)
                        <br>
                        &emsp;&emsp;-   E-mailadres
                        <br>
                        &emsp;&emsp;-   Betaalgegevens (via beveiligde betaalprovider)
                    </p>
                </div>


                {{-- Row 3 --}}
                <div class="flex flex-row justify-between">
                    <p class="w-full">
                        <span class="font-semibold">3. Met welk doel verwerken wij persoonsgegevens?</span>
                        <br>
                        &emsp;<span class="font-semibold">Wij gebruiken jouw gegevens voor de volgende doeleinden:</span>
                        <br>
                        &emsp;&emsp;-   Het afhandelen van bestellingen en betalingen
                        <br>
                        &emsp;&emsp;-   Het verzenden van producten
                        <br>
                        &emsp;&emsp;-   Contact opnemen bij vragen of updates over je bestelling
                        <br>
                        &emsp;&emsp;-   Voldoen aan wettelijke verplichtingen (zoals belastingaangifte)
                    </p>
                </div>


                {{-- Row 4 --}}
                <div class="flex flex-row justify-between">
                    <p class="w-full">
                        <span class="font-semibold">4. Hoe lang bewaren wij jouw gegevens?</span>
                        <br>
                        &emsp;Wij bewaren je persoonsgegevens niet langer dan noodzakelijk is. Bestel- en facturatiegegevens worden bewaard zolang dat wettelijk verplicht is.
                    </p>
                </div>


                {{-- Row 5 --}}
                <div class="flex flex-row justify-between">
                    <p class="w-full">
                        <span class="font-semibold">5. Delen van gegevens met derden</span>
                        <br>
                        <span class="font-semibold">Wij delen jouw gegevens alleen met derden als dat nodig is voor de uitvoering van de overeenkomst, bijvoorbeeld:</span>
                        <br>
                        &emsp;-   Betaalproviders (zoals Mollie, PayPal, etc.)
                        <br>
                        &emsp;-   Verzenddiensten (zoals PostNL, DHL, etc.)
                        <br>
                        &emsp;-   Boekhouder of accountant (alleen indien van toepassing)
                        <br>
                        <span class="font-semibold">Deze partijen zijn verplicht om zorgvuldig met jouw gegevens om te gaan en deze niet voor eigen doeleinden te gebruiken.</span>
                    </p>
                </div>


                {{-- Row 6 --}}
                <div class="flex flex-row justify-between">
                    <p class="w-full">
                        <span class="font-semibold">6. Cookies of vergelijkbare technieken</span>
                        <br>
                        Onze website maakt mogelijk gebruik van cookies om de website goed te laten functioneren en om inzicht te krijgen in het gebruik van de site.
                        Je kunt cookies zelf uitschakelen via je browserinstellingen.
                    </p>
                </div>


                {{-- Row 7 --}}
                <div class="flex flex-row justify-between">
                    <p class="w-full">
                        <span class="font-semibold">7. Jouw rechten</span>
                        <br>
                        <span class="font-semibold">Je hebt het recht om:</span>
                        <br>
                        &emsp;-   Je persoonsgegevens in te zien
                        <br>
                        &emsp;-   Je gegevens te laten corrigeren
                        <br>
                        &emsp;-   Je gegevens te laten verwijderen
                        <br>
                        &emsp;-   Je toestemming voor gegevensverwerking in te trekken
                        <br>
                        &emsp;-   Een klacht in te dienen bij de Autoriteit Persoonsgegevens
                        <br>
                        Wil je een van deze rechten uitoefenen? Neem dan contact met ons op via: <span class="font-semibold">{{ $business->business_email }}</span>.
                    </p>
                </div>


                {{-- Row 8 --}}
                <div class="flex flex-row justify-between">
                    <p class="w-full">
                        <span class="font-semibold">8. Beveiliging</span>
                        <br>
                        Wij nemen passende technische en organisatorische maatregelen om jouw gegevens te beveiligen tegen verlies of ongeautoriseerde toegang.
                        Gegevens worden bijvoorbeeld via beveiligde SSL-verbindingen verzonden.
                    </p>
                </div>


                {{-- Row 9 --}}
                <div class="flex flex-row justify-between">
                    <p class="w-full">
                        <span class="font-semibold">9. Wijzigingen in deze privacyverklaring</span>
                        <br>
                        Wij behouden het recht om deze privacyverklaring aan te passen. De meest actuele versie is altijd beschikbaar op onze website.
                    </p>
                </div>
            </div>
          </div>
        </div>
    </div>
</section>
