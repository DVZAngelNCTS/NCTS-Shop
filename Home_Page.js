const canvas = document.createElement('canvas');
canvas.style.cssText = 'position:fixed;inset:0;z-index:0;pointer-events:none;';
document.body.appendChild(canvas);
const ctx = canvas.getContext('2d');

const offscreen = document.createElement('canvas');
const octx = offscreen.getContext('2d');

let cssW = 0, cssH = 0;
let dpr = 1;

const CSS_CELL   = 45;
const CSS_RADIUS = 160;
const CSS_STEP   = 8;

let CELL   = CSS_CELL;
let RADIUS = CSS_RADIUS;
let STEP   = CSS_STEP;

let mx = -9999, my = -9999;
let rafId = null;

function updatePhysicalConstants() {
    CELL   = CSS_CELL   * dpr;
    RADIUS = CSS_RADIUS * dpr;
    STEP   = CSS_STEP   * dpr;
}

function resize() {
    cssW = window.innerWidth;
    cssH = window.innerHeight;
    dpr  = window.devicePixelRatio || 1;
    updatePhysicalConstants();

    const physW = Math.round(cssW * dpr);
    const physH = Math.round(cssH * dpr);

    canvas.width  = offscreen.width  = physW;
    canvas.height = offscreen.height = physH;

    canvas.style.width  = cssW + 'px';
    canvas.style.height = cssH + 'px';

    ctx.setTransform(1, 0, 0, 1, 0, 0);
    octx.setTransform(1, 0, 0, 1, 0, 0);

    buildBaseGrid();
    draw();
}

function buildBaseGrid() {
    const W = canvas.width;
    const H = canvas.height;
    const D = W + H;
    octx.clearRect(0, 0, W, H);
    octx.strokeStyle = 'rgba(200,205,255,0.11)';
    octx.lineWidth = 0.6 * dpr;

    for (let k = -D; k <= D + CELL; k += CELL) {
        octx.beginPath();
        octx.moveTo(-H, k - H);
        octx.lineTo(W + H, k + W + H);
        octx.stroke();
    }
    for (let k = -D; k <= D + CELL; k += CELL) {
        octx.beginPath();
        octx.moveTo(-H, k + H);
        octx.lineTo(W + H, k - W - H);
        octx.stroke();
    }
}

function segStyle(dist) {
    const t = Math.max(0, 1 - dist / RADIUS);
    return {
        color: `rgba(${Math.round(79 + 121 * (1 - t))},${Math.round(195 + 10 * (1 - t))},${Math.round(247 + 8 * (1 - t))},${(0.09 + t * 0.80).toFixed(2)})`,
        width: (0.6 + t * 2.2) * dpr,
        t: t,
    };
}

function drawLineSegmented(x1, y1, x2, y2) {
    const dx = x2 - x1, dy = y2 - y1;
    const len = Math.hypot(dx, dy);
    const steps = Math.ceil(len / STEP);
    for (let i = 0; i < steps; i++) {
        const ta = i / steps, tb = (i + 1) / steps;
        const ax = x1 + dx * ta, ay = y1 + dy * ta;
        const bx = x1 + dx * tb, by = y1 + dy * tb;
        const midX = (ax + bx) / 2, midY = (ay + by) / 2;
        const dist = Math.hypot(midX - mx, midY - my);
        if (dist >= RADIUS) continue;
        const s = segStyle(dist);
        if (s.t < 0.01) continue;
        ctx.beginPath();
        ctx.strokeStyle = s.color;
        ctx.lineWidth   = s.width;
        ctx.moveTo(ax, ay);
        ctx.lineTo(bx, by);
        ctx.stroke();
    }
}

function drawGrid() {
    const W = canvas.width;
    const H = canvas.height;
    const D = W + H;

    ctx.clearRect(0, 0, W, H);
    ctx.drawImage(offscreen, 0, 0);

    const threshold = RADIUS * Math.SQRT2;
    const base45 = my - mx;
    const kStart45 = Math.ceil((base45 - threshold + D) / CELL) * CELL - D;
    for (let k = kStart45; k <= base45 + threshold; k += CELL) {
        if (k < -D || k > D + CELL) continue;
        drawLineSegmented(-H, k - H, W + H, k + W + H);
    }

    const base135 = my + mx;
    const kStart135 = Math.ceil((base135 - threshold + D) / CELL) * CELL - D;
    for (let k = kStart135; k <= base135 + threshold; k += CELL) {
        if (k < -D || k > D + CELL) continue;
        drawLineSegmented(-H, k + H, W + H, k - W - H);
    }

    if (mx > 0 && my > 0) {
        const grad = ctx.createRadialGradient(mx, my, 0, mx, my, RADIUS * 0.8);
        grad.addColorStop(0, 'rgba(79,195,247,0.07)');
        grad.addColorStop(1, 'rgba(79,195,247,0)');
        ctx.fillStyle = grad;
        ctx.fillRect(0, 0, W, H);
    }

    rafId = null;
}

function draw() {
    if (rafId) return;
    rafId = requestAnimationFrame(drawGrid);
}

function updateCursorPosition(clientX, clientY) {
    mx = clientX * dpr;
    my = clientY * dpr;
    draw();
}

document.addEventListener('mousemove', e => updateCursorPosition(e.clientX, e.clientY));
document.addEventListener('mouseleave', () => { mx = -9999; my = -9999; draw(); });

document.addEventListener('touchmove', e => {
    e.preventDefault();
    const touch = e.touches[0];
    if (touch) updateCursorPosition(touch.clientX, touch.clientY);
}, { passive: false });
document.addEventListener('touchend', () => { mx = -9999; my = -9999; draw(); });

const ro = new ResizeObserver(() => resize());
ro.observe(document.documentElement);

resize();