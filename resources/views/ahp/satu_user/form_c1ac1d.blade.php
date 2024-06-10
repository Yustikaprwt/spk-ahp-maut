{{-- INVENTARIS KAMAR & FASILITAS PENDUKUNG (C1A-C1D) --}}

<div class="input-group">
    <label>Inventaris Kamar</label>
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
                id="slider13" 
                name="C1A-C1D"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue13(this.value)">
            <span class="value-label" id="sliderValue13">1</span>
            <div class="slider-tooltip" id="sliderTooltip13">1</div>

            <span class="slider-label mark-9">9</span>
            <span class="slider-label mark-8">8</span>
            <span class="slider-label mark-7">7</span>
            <span class="slider-label mark-6">6</span>
            <span class="slider-label mark-5">5</span>
            <span class="slider-label mark-4">4</span>
            <span class="slider-label mark-3">3</span>
            <span class="slider-label mark-2">2</span>
            <span class="slider-label mark-1">1</span>
            <span class="slider-label mark-0_50">2</span>
            <span class="slider-label mark-0_33">3</span>
            <span class="slider-label mark-0_25">4</span>
            <span class="slider-label mark-0_20">5</span>
            <span class="slider-label mark-0_16">6</span>
            <span class="slider-label mark-0_14">7</span>
            <span class="slider-label mark-0_12">8</span>
            <span class="slider-label mark-0_11">9</span>
        </div>
    <label>Fasilitas Pendukung</label>
</div>

<script>
const slider13 = document.getElementById('slider13');
const sliderValue13 = document.getElementById('sliderValue13');
const sliderTooltip13 = document.getElementById('sliderTooltip13');


function updateValue13(value) {
    const snappedValue = values[value - 1];
    sliderValue13.innerText = snappedValue;
    slider13.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip13.innerText = snappedValue;
    console.log(`User input 12 : ${snappedValue}`);
}

slider13.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue13(value);
});

updateValue13(slider13.value);
</script>

