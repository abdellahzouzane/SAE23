const SIZE = 4;
let board = [];
let emptyRow = 2, emptyCol = 1;
let moves = 0;

const solved = [
    [1,  2,  3,  4],
    [5,  6,  7,  8],
    [9, 10, 11, 12],
    [13,14, 15,  0]
];

function initBoard() {
    board = [
        [11, 8, 5, 6],
        [7,10, 4,14],
        [13, 0, 9, 2],
        [15,12, 3, 1]
    ];
    emptyRow = 2;
    emptyCol = 1;
    moves = 0;
    document.getElementById('moves').textContent = moves;
    document.getElementById('win').style.display = 'none';
    renderBoard();
}

function renderBoard() {
    const game = document.getElementById('jeu');
    game.innerHTML = '';
    for (let r = 0; r < SIZE; r++) {
        for (let c = 0; c < SIZE; c++) {
            const val = board[r][c];
            const tile = document.createElement('div');
            tile.className = 'case';
            if (val === 0) {
                tile.classList.add('empty');
            } else {
                tile.textContent = val;
                tile.onclick = () => moveTile(r, c);
            }
            game.appendChild(tile);
        }
    }
}

function moveTile(row, col) {
    if (Math.abs(row - emptyRow) + Math.abs(col - emptyCol) === 1) {
        // échange
        board[emptyRow][emptyCol] = board[row][col];
        board[row][col] = 0;
        emptyRow = row;
        emptyCol = col;
        moves++;
        document.getElementById('moves').textContent = moves;
        renderBoard();

        if (checkWin()) {
            document.getElementById('win').style.display = 'block';
            document.getElementById('finalMoves').textContent = moves;
        }
    }
}

function checkWin() {
    for (let r = 0; r < SIZE; r++) {
        for (let c = 0; c < SIZE; c++) {
            if (board[r][c] !== solved[r][c]) return false;
        }
    }
    return true;
}

function shuffleBoard() {
    for (let i = 0; i < 250; i++) {
        const dirs = [[-1,0],[1,0],[0,-1],[0,1]];
        const [dr, dc] = dirs[Math.floor(Math.random()*4)];
        const nr = emptyRow + dr, nc = emptyCol + dc;
        if (nr >= 0 && nr < SIZE && nc >= 0 && nc < SIZE) {
            board[emptyRow][emptyCol] = board[nr][nc];
            board[nr][nc] = 0;
            emptyRow = nr;
            emptyCol = nc;
        }
    }
    moves = 0;
    document.getElementById('moves').textContent = moves;
    document.getElementById('win').style.display = 'none';
    renderBoard();
}

function resetGame() {
    initBoard();
}

function solvePuzzle() {
    board = JSON.parse(JSON.stringify(solved));

    // Met à jour la position de la case vide
    emptyRow = 3;
    emptyCol = 3;

    renderBoard();

    document.getElementById('win').style.display = 'block';
    document.getElementById('finalMoves').textContent = moves;
}

// Lancement du jeu numérique au chargement
window.onload = () => {
    initBoard();
};