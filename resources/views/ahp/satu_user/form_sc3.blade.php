{{-- SUBKRITERIA LOKASI --}}

{{-- DEKAT DENGAN KAMPUS & DEKAT DENGAN LAYANAN PUBLIK (C3A-C3B) --}}

<div class="input-group">
    <label>Dekat dengan Kampus</label>
        <div class="slider-container">
            <span class="slider-mark mark-9"></span>
            <span class="slider-mark mark-8"></span>
            <span class="slider-mark mark-7"></span>
            <span class="slider-mark mark-6"></span>
            <span class="slider-mark mark-5"></span>
            <span class="slider-mark mark-4"></span>
            <span class="slider-mark mark-3"></span>
            <span class="slider-mark mark-2"></span>
            <span class="slider-mark mark-1"></span>
            <span class="slider-mark mark-0_50"></span>
            <span class="slider-mark mark-0_33"></span>
            <span class="slider-mark mark-0_25"></span>
            <span class="slider-mark mark-0_20"></span>
            <span class="slider-mark mark-0_16"></span>
            <span class="slider-mark mark-0_14"></span>
            <span class="slider-mark mark-0_12"></span>
            <span class="slider-mark mark-0_11"></span>

            <input 
                type="range" 
                id="slider18" 
                name="C3A-C3B"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue18(this.value)">
            <span class="value-label" id="sliderValue18">1</span>
            <div class="slider-tooltip" id="sliderTooltip18">1</div>

            <span style="margin-top: 10px" class="slider-label mark-9">9</span>
            <span style="margin-top: 10px" class="slider-label mark-8">8</span>
            <span style="margin-top: 10px" class="slider-label mark-7">7</span>
            <span style="margin-top: 10px" class="slider-label mark-6">6</span>
            <span style="margin-top: 10px" class="slider-label mark-5">5</span>
            <span style="margin-top: 10px" class="slider-label mark-4">4</span>
            <span style="margin-top: 10px" class="slider-label mark-3">3</span>
            <span style="margin-top: 10px" class="slider-label mark-2">2</span>
            <span style="margin-top: 10px" class="slider-label mark-1">1</span>
            <span style="margin-top: 10px" class="slider-label mark-0_50">2</span>
            <span style="margin-top: 10px" class="slider-label mark-0_33">3</span>
            <span style="margin-top: 10px" class="slider-label mark-0_25">4</span>
            <span style="margin-top: 10px" class="slider-label mark-0_20">5</span>
            <span style="margin-top: 10px" class="slider-label mark-0_16">6</span>
            <span style="margin-top: 10px" class="slider-label mark-0_14">7</span>
            <span style="margin-top: 10px" class="slider-label mark-0_12">8</span>
            <span style="margin-top: 10px" class="slider-label mark-0_11">9</span>
        </div>
    <label>Dekat dengan Layanan Publik</label>
</div>

<script>
const slider18 = document.getElementById('slider18');
const sliderValue18 = document.getElementById('sliderValue18');
const sliderTooltip18 = document.getElementById('sliderTooltip18');

function updateValue18(value) {
    const snappedValue = values[value - 1];
    sliderValue18.innerText = snappedValue;
    slider18.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip18.innerText = snappedValue;
    console.log(`User input 16 : ${snappedValue}`);
}

slider18.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue18(value);
});

updateValue18(slider18.value);
</script>

