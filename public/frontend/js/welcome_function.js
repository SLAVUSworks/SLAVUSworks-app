const taskbar = document.getElementById("taskbar");

function closeWindow(id) {
    const win = document.getElementById(id);
    win.style.display = "none";

    const taskBtn = document.querySelector(`[data-task="${id}"]`);
    if (taskBtn) taskBtn.remove();
}

function minimizeWindow(id) {
    const win = document.getElementById(id);
    win.style.display = "none";

    const taskBtn = document.querySelector(`[data-task="${id}"]`);
    if (taskBtn) taskBtn.classList.remove("active");
}

function toggleWindow(id) {
    const win = document.getElementById(id);
    const taskBtn = document.querySelector(`[data-task="${id}"]`);
    if (!win) return;

    const isHidden = win.style.display === "none";
    win.style.display = isHidden ? "block" : "none";

    document.querySelectorAll("#taskbar .button").forEach((btn) => {
        btn.classList.remove("active");
    });

    if (isHidden && taskBtn) {
        taskBtn.classList.add("active");
    }
}

function openWindow(id) {
    const win = document.getElementById(id);
    if (!win) return;

    win.style.display = "block";

    let taskBtn = document.querySelector(`[data-task="${id}"]`);
    if (!taskBtn) {
        taskBtn = document.createElement("button");
        taskBtn.className = "button h-full px-4 active";
        taskBtn.innerText =
            win.querySelector(".title-bar-text")?.innerText || id;
        taskBtn.setAttribute("data-task", id);
        taskBtn.onclick = () => toggleWindow(id);
        taskbar.appendChild(taskBtn);
    }

    document.querySelectorAll("#taskbar .button").forEach((btn) => {
        btn.classList.remove("active");
    });
    taskBtn.classList.add("active");
}

window.onload = () => {
    document.querySelectorAll(".window").forEach((win) => {
        win.style.display = "none";
    });

    const defaultWindow = document.querySelector(
        ".window[data-default='true']"
    );
    if (defaultWindow) {
        openWindow(defaultWindow.id);
    }
};

function updateClock() {
    const clock = document.getElementById("clock");
    const now = new Date();

    const hours = now.getHours().toString().padStart(2, "0");
    const minutes = now.getMinutes().toString().padStart(2, "0");

    clock.innerHTML = `${hours}:${minutes} GMT+7`;
}

setInterval(updateClock, 1000);
updateClock();
