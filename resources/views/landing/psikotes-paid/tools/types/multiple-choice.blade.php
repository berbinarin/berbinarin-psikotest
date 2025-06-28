    <div class="h-11/12 relative flex flex-col items-center justify-center bg-gray-100 md:min-h-screen">
        <form>
            <input type="hidden" name="timeout" id="timeout" value="false" />
            <!-- Background Image -->
            <img src="{{ asset("/assets/images/psikotes-paid/psikotes-soal-bg.png") }}" alt="Latar Belakang Berbinar" class="absolute inset-0 z-0 hidden object-cover md:block md:h-full md:w-full" />

            <!-- Container for Icons above Card -->
            <div class="absolute left-0 right-0 top-0 z-10 mt-8 flex items-center justify-center">
                <div class="flex h-[50px] items-center rounded-full bg-white px-4 py-2">
                    <img src="{{ asset("assets/images/psikotes-paid/logo-berbinar.png") }}" alt="Ikon" class="h-8 w-8 rounded-full" />
                    <img src="{{ asset("assets/images/psikotes-paid/logo-berbinar-psikotes.png") }}" alt="Ikon" class="ml-2 h-8 w-8 rounded-full" />
                </div>
                <h1>Test 01</h1>
            </div>

            <!-- Main Content Area -->
            <div class="w-3xl relative z-10 mx-auto mt-20 rounded-lg bg-none p-6" style="width: 750px">
                <!-- Blue and Orange Cards in Horizontal Layout -->
                <div class="flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                    <!-- Blue Card -->
                    <label class="card relative my-8 flex-1 cursor-pointer rounded-lg p-4" style="background-color: #3fa2f6; width: 100px; height: 150px; margin-top: 0px; transition: transform 0.2s ease" onmouseover="this.style.boxShadow='0 6px 12px rgba(0, 125, 232, 0.6), 0 -6px 12px rgba(0, 125, 232, 0.6), -6px 0 12px rgba(0, 125, 232, 0.6), 6px 0 12px rgba(0, 125, 232, 0.6)';" onmouseout="this.style.boxShadow='none';">
                        <input type="radio" name="answer"  value="1" class="hidden" required />
                        <div class="select-none text-white" style="margin-left: 5px; margin-top: 20px; margin-right: 5px; height: 70px">
                            {{ ($psikotesTool->sections[0]->questions[0]-> }}
                        </div>
                        <!-- Circle Button for Blue Card -->
                        <div class="absolute bottom-2 right-2 flex h-5 w-5 items-center justify-center rounded-full bg-white" style="border: 2px solid #3fa2f6; margin-top: 3%; margin-left: 85%">
                            <span class="checkmark text-lg" style="color: #3fa2f6; font-size: 12px"><strong>&#10003;</strong></span>
                        </div>
                    </label>

                    <!-- Orange Card -->
                    <label class="card relative my-8 flex-1 cursor-pointer rounded-lg p-4" style="background-color: #fbb03b; width: 100px; height: 150px; transition: transform 0.2s ease" onmouseover="this.style.boxShadow='0 8px 16px rgba(251, 176, 59, 0.6), 0 -8px 16px rgba(251, 176, 59, 0.6), -8px 0 16px rgba(251, 176, 59, 0.6), 8px 0 16px rgba(251, 176, 59, 0.6)';" onmouseout="this.style.boxShadow='none';">
                        <input type="radio" name="answer" value="2" class="hidden" />
                        <div class="select-none text-white" style="margin-left: 5px; margin-top: 20px; margin-right: 5px; height: 70px">
                            {{ ($psikotesTool->sections[0]->questions[0]-> }}
                        </div>
                        <!-- Circle Button for Orange Card -->
                        <div class="absolute bottom-2 right-2 flex h-5 w-5 items-center justify-center rounded-full bg-white" style="border: 2px solid #fbb03b; margin-top: 3%; margin-left: 85%">
                            <span checkmark text-lg" style="color: #fbb03b; font-size: 12px"><strong>&#10003;</strong></span>
                        </div>
                    </label>
                </div>

                <script>
                    document.querySelectorAll('input[type="radio"]').forEach((radio) => {
                        radio.addEventListener('change', function () {
                            // Hide all checkmarks
                            document.querySelectorAll('.checkmark').forEach((checkmark) => {
                                checkmark.classList.add('hidden');
                            });

                            // Show the checkmark for the selected 
                            if (this.checked) {
                                this.closest('label').querySelector('.checkmark').classList.remove('hidden');
                            }
                        });
                    });

                    // Add hover effect to card labels
                    document.querySelectorAll('.card').forEach((card) => {
                        card.addEventListener('mouseover', function () {
                            this.style.transform = 'scale(1.03)';
                        });
                        card.addEventListener('mouseout', function () {
                            this.style.transform = 'scale(1)';
                        });
                    });
                </script>

                <!-- Timer -->
                <div class="z-20 mb-2 mt-4 text-center">
                    <span id="timer" class="text-xl font-semibold text-red-600"></span>
                </div>

                <!-- Percentage Line and Next Button -->
                <div class="mt-10 flex items-center justify-between rounded-md bg-white" style="height: 40px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)">
                    <div class="ml-6 flex items-center" style="height: 3px; width: 510px; position: relative">
                        <!-- Black background line -->
                        <div class="rounded-full bg-black" style="height: 3px; width: 100%"></div>
                        <!-- Blue percentage line -->
                        <div class="rounded-full bg-blue-500" style="height: 3px; width: {{ $progress }}%; position: absolute; top: 0; left: 0"></div>
                        <!-- Small circle at the end of the blue line -->
                        <div class="rounded-full bg-blue-500" style="height: 10px; width: 10px; position: absolute; top: -4px; left: {{ $progress }}%; transform: translateX(-50%)"></div>
                        <!-- Percentage text -->
                        <span class="text-sm text-black" style="position: absolute; top: 1px; left: {{ $progress }}%; transform: translateX(-50%); font-size: 8px">{{ $progress }}%</span>
                    </div>
                    <button type="submit" class="mr-2 rounded-lg bg-blue-500 px-4 py-1 text-sm text-white hover:bg-blue-600">
                        {{ $progress == 100 ? "Selesai" : "Soal Berikutnya" }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        const totalDuration = 45 * 60 * 1000;

        let startTime = localStorage.getItem('startTime') || new Date().getTime();
        localStorage.setItem('startTime', startTime);

        const timerElement = document.getElementById('timer');

        const timerInterval = setInterval(() => {
            const now = new Date().getTime();
            const elapsed = now - startTime;
            const remaining = totalDuration - elapsed;

            if (remaining <= 0) {
                clearInterval(timerInterval);
                localStorage.removeItem('startTime');
                document.getElementById('timeout').value = true;
                document.querySelector('form').submit();
            }

            const minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((remaining % (1000 * 60)) / 1000);

            console.log('Waktu sisa', minutes + '' + seconds);

            // timerElement.innerHTML = `Waktu Tersisa: ${minutes}m ${seconds}s`;
        }, 1000);
    </script>
