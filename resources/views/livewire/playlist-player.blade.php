<div style="position: fixed; right: 20px; bottom: 20px;">
    {{-- les composant livewire ont besoin d'une balise racine commune --}}
    <div class="card p-2">
        <div class="h3" style="font-size: 45px">The Radio</div>
        <audio controls class="" id="audioPlayer"></audio>
    </div>
    <script>
        initAutoPlayer()
        function initAutoPlayer() {
            const audioPlayer = document.getElementById('audioPlayer')
            const playlist = @json($playlist);
            let currentTrack = 0;

            function playTrack(index) {
                if (playlist.length === 0) return;

                audioPlayer.src = playlist[index];
                audioPlayer.play();
            }

            audioPlayer.addEventListener('ended', () => {
                currentTrack = (currentTrack + 1) % playlist.length;
                playTrack(currentTrack);
            });

            if(playlist.length > 0){
                playTrack(0)
            }
        }
    </script>
</div>
