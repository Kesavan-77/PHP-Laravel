const getTreeData = () => {
    return {
        "data": "A",
        "left": {
            "data": "B",
            "left": {
                "data": "D",
                "left": null,
                "right": null
            },
            "right": {
                "data": "E",
                "left": null,
                "right": null
            }
        },
        "right": {
            "data": "C",
            "left": {
                "data": "F",
                "left": null,
                "right": null
            },
            "right": {
                "data": "G",
                "left": {
                    "data": "Z",
                    "left": null,
                    "right": {
                        "data": "Y",
                        "left": null,
                        "right": null
                    }
                },
                "right": null
            }
        }
    };
};

const renderBinaryTree = (node) => {
    const { left, right, data } = node;
    let html = `
      <div class="node__element" id="node_${data}">${data}</div>
    `;
    if (left || right) {
        html += `
        <div class="node__bottom-line"></div>
        <div class="node__children">
      `;
        if (left) {
            html += `
          <div class="node node--left">
            ${renderBinaryTree(left)}
          </div>
        `;
        }
        if (right) {
            html += `
          <div class="node node--right">
            ${renderBinaryTree(right)}
          </div>
        `;
        }
        html += `
        </div>
      `;
    }
    return html;
};

function getMaxDepth(node) {
    if (node === null) return 0;
    const leftDepth = getMaxDepth(node.left);
    const rightDepth = getMaxDepth(node.right);
    return Math.max(leftDepth, rightDepth) + 1;
}

function assignValuesByDepth(node, currentDepth, maxDepth, arr) {
    if (node === null) return;
    const value = arr[maxDepth - currentDepth];
    const nodeElement = document.getElementById(`node_${node.data}`);
    if (nodeElement) {
        nodeElement.textContent += ` (${value})`;
    }
    assignValuesByDepth(node.left, currentDepth + 1, maxDepth, arr);
    assignValuesByDepth(node.right, currentDepth + 1, maxDepth, arr);
}

const main = () => {
    const rootNode = getTreeData();
    const treeDOMElement = document.querySelector('.tree');
    treeDOMElement.innerHTML = renderBinaryTree(rootNode);
    const maxDepth = getMaxDepth(rootNode);
    let arr = [1000];
    for (let i = 1; i <= maxDepth; i++) {
        arr.push(arr[arr.length - 1] + (arr[arr.length - 1] / 100) * 10);
    }
    console.log('Max Depth:', maxDepth);
    console.log('Array:', arr);
    assignValuesByDepth(rootNode, 1, maxDepth, arr);
};

main();
