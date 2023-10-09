document.addEventListener("DOMContentLoaded", function() {
    const treeList = document.getElementById("treeList");
    const addNodeButton = document.getElementById("addNode");

    addNodeButton.addEventListener("click", function() {
        const newNodeText = prompt("新しい要素の名前を入力してください:");
        if (newNodeText) {
            const newNode = document.createElement("li");
            const span = document.createElement("span");
            span.classList.add("node");
            span.textContent = newNodeText;
            newNode.appendChild(span);
            treeList.appendChild(newNode);
        }
    });
});
