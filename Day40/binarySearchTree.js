class Node {
    constructor(data, left = null, right = null) {
        this.data = data;
        this.left = left;
        this.right = right;
    }
}
class BST {
    constructor() {
        this.root = null;
    }

    add(data) {

        if (this.root === null) {
            this.root = new Node(data);
            return
        } else {
            const searchTree = function (node) {
                if (data < node.data) {
                    if (node.left === null) {
                        node.left = new Node(data);
                        return
                    }
                    else if (node.left !== null) {
                        return searchTree(node.left);
                    }
                } else if (data > node.data) {
                    if (node.right === null) {
                        node.right = new Node(data);
                        return
                    }
                    else if (node.right !== null) {
                        return searchTree(node.right);
                    }
                } else {
                    return null;
                }
            };

            return searchTree(node);
        }
    }

    insertAt(parentNodeData, data, side) {
        if (this.root === null) {
            console.log("The tree is empty. Add the root first.");
            return;
        }

        const searchTree = (node) => {
            console.log("Node",node);
            if (node === null) return false;

            if (node.data === parentNodeData) {
                if (side === 'left') {
                    if (node.left === null) {
                        node.left = new Node(data);
                        return true;
                    } else {
                        console.log("Left child already exists.");
                        return false;
                    }
                } else if (side === 'right') {
                    if (node.right === null) {
                        node.right = new Node(data);
                        return true;
                    } else {
                        console.log("Right child already exists.");
                        return false;
                    }
                } else {

                    console.log("Invalid side specified.");
                    return false;
                }
            }

            return searchTree(node.left) || searchTree(node.right);
        };

        if (!searchTree(this.root)) {
            console.log("Parent node not found.");
        }
    }

    levelOrderTraversal() {
        if (this.root === null) return;

        let queue = [this.root];
        while (queue.length > 0) {
            let currentNode = queue.shift();
            console.log(currentNode.data);

            if (currentNode.left !== null) {
                queue.push(currentNode.left);
            }
            if (currentNode.right !== null) {
                queue.push(currentNode.right);
            }
        }
    }

    postOrderTraversal(node) {
        if (node === null) return;

        this.postOrderTraversal(node.right);
        this.postOrderTraversal(node.left);
        console.log(node.data);
    }

    traverseLeafToRoot() {
        this.postOrderTraversal(this.root);
    }
}

const bst = new BST();
bst.add('A');
bst.insertAt('A', 'B', 'left');
bst.insertAt('A', 'C', 'right');
bst.insertAt('B', 'D', 'left');
bst.insertAt('B', 'E', 'right');
bst.insertAt('C', 'F', 'left');
bst.insertAt('C', 'G', 'right');

console.log("Leaf to Root Traversal:");
bst.traverseLeafToRoot();