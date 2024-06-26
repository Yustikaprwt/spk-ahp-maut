{{-- FASILITAS & LINGKUNGAN USER 1 (C1-C4-U2) --}}
<div class="input-group-1">
    <label>Fasilitas Indekos</label>
        <div class="slider-container1">
            <span class="slider-mark-1 mark-9-1"></span>
            <span class="slider-mark-1 mark-8-1"></span>
            <span class="slider-mark-1 mark-7-1"></span>
            <span class="slider-mark-1 mark-6-1"></span>
            <span class="slider-mark-1 mark-5-1"></span>
            <span class="slider-mark-1 mark-4-1"></span>
            <span class="slider-mark-1 mark-3-1"></span>
            <span class="slider-mark-1 mark-2-1"></span>
            <span class="slider-mark-1 mark-1-1"></span>
            <span class="slider-mark-1 mark-0_50-1"></span>
            <span class="slider-mark-1 mark-0_33-1"></span>
            <span class="slider-mark-1 mark-0_25-1"></span>
            <span class="slider-mark-1 mark-0_20-1"></span>
            <span class="slider-mark-1 mark-0_16-1"></span>
            <span class="slider-mark-1 mark-0_14-1"></span>
            <span class="slider-mark-1 mark-0_12-1"></span>
            <span class="slider-mark-1 mark-0_11-1"></span>
      
            <input 
                type="range" 
                id="slider3u2" 
                name="C1-C4-U2"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue3u2(this.value)">
            <span class="value-label" id="sliderValue3u2">1</span>
            <div class="slider-tooltip-1" id="sliderTooltip3u2">1</div>

            <span class="slider-label-1 mark-9-1">9</span>
            <span class="slider-label-1 mark-8-1">8</span>
            <span class="slider-label-1 mark-7-1">7</span>
            <span class="slider-label-1 mark-6-1">6</span>
            <span class="slider-label-1 mark-5-1">5</span>
            <span class="slider-label-1 mark-4-1">4</span>
            <span class="slider-label-1 mark-3-1">3</span>
            <span class="slider-label-1 mark-2-1">2</span>
            <span class="slider-label-1 mark-1-1">1</span>
            <span class="slider-label-1 mark-0_50-1">2</span>
            <span class="slider-label-1 mark-0_33-1">3</span>
            <span class="slider-label-1 mark-0_25-1">4</span>
            <span class="slider-label-1 mark-0_20-1">5</span>
            <span class="slider-label-1 mark-0_16-1">6</span>
            <span class="slider-label-1 mark-0_14-1">7</span>
            <span class="slider-label-1 mark-0_12-1">8</span>
            <span class="slider-label-1 mark-0_11-1">9</span>
        </div>
    <label>Lingkungan & Keamanan Indekos</label>
</div>

<script>
const slider3u2 = document.getElementById('slider3u2');
const sliderValue3u2 = document.getElementById('sliderValue3u2');
const sliderTooltip3u2 = document.getElementById('sliderTooltip3u2');

function updateValue3u2(value) {
    const snappedValue = values[value - 1];
    sliderValue3u2.innerText = snappedValue;
    slider3u2.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip3u2.innerText = snappedValue;
}

slider3u2.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue3u2(value);
});

updateValue3u2(slider3u2.value);
</script>