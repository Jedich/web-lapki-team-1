function tip() {
	Array.from(document.querySelectorAll("[info]")).forEach((el) => {
		let tip = document.createElement("div");
		tip.classList.add("tooltip");
		tip.innerText = el.getAttribute("info");
		tip.style.transform = "translate(15px, 0px)";
		el.appendChild(tip);
		el.onmousemove = (e) => {
			tip.style.left = e.clientX + "px";
			tip.style.top = e.clientY + "px";
		};
	});
}