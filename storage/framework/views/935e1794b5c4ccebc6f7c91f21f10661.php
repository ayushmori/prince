<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3 class="my-4 text-center">Categories</h3>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .category-box,
            .subcategory-box {
                padding: 15px;
                margin: 10px 0;
                cursor: pointer;
                border: 1px solid #ddd;
                border-radius: 5px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .category-box:hover,
            .subcategory-box:hover {
                background-color: #f0f0f0;
            }

            .category-container,
            .subcategory-container {
                height: 300px;
                overflow-y: auto;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 10px;
                background-color: #f9f9f9;
            }

            .subcategory-container {
                min-width: 200px;
            }

            /* Flexbox for scrollable horizontal layout */
            .d-flex {
                gap: 20px;
                overflow-x: auto;
                white-space: nowrap;
            }

            .modal-backdrop.show {
                background-color: rgba(0, 0, 0, 0.5);
                /* Black with 50% opacity */
            }

            /* Modal Content Position and Styling */
            .modal-content {
                top: 120px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                /* Optional shadow for better visibility */
            }
        </style>

        <!-- Button to Open Modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
            Open Categories
        </button>

        <!-- Modal -->
        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">Categories</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Categories Layout -->
                        <div class="row mt-4">
                            <!-- Parent Categories Section -->
                            <div class="col-md-2">
                                <h4>Parent Categories</h4>
                                <div class="category-container">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div id="category-<?php echo e($category->id); ?>" class="category-box"
                                            onclick="showSubCategories(<?php echo e($category->id); ?>, '<?php echo e($category->name); ?>')">
                                            <?php echo e($category->name); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <!-- Subcategories and Deeper Levels -->
                            <div class="col-md-10">
                                <div class="d-flex">
                                    <!-- Subcategories Container -->
                                    <div>
                                        <h5 id="subcategory-title"></h5>
                                        <div id="subcategory-container" class="subcategory-container"></div>
                                    </div>

                                    <!-- Sub-Subcategories Container -->
                                    <div>
                                        <h5 id="subsubcategory-title"></h5>
                                        <div id="subsubcategory-container" class="subcategory-container"></div>
                                    </div>

                                    <!-- Sub-Sub-Subcategories Container -->
                                    <div>
                                        <h5 id="subsubsubcategory-title"></h5>
                                        <div id="subsubsubcategory-container" class="subcategory-container"></div>
                                    </div>

                                    <!-- Sub-Sub-Sub-Subcategories Container -->
                                    <div>
                                        <h5 id="subsubsubsubcategory-title"></h5>
                                        <div id="subsubsubsubcategory-container" class="subcategory-container"></div>
                                    </div>

                                    <!-- Sub-Sub-Sub-Sub-Subcategories Container -->
                                    <div>
                                        <h5 id="subsubsubsubsubcategory-title"></h5>
                                        <div id="subsubsubsubsubcategory-container" class="subcategory-container"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- JavaScript for Dynamic Rendering -->
        <script>
            function showSubCategories(categoryId, categoryName) {
                document.getElementById("subcategory-title").innerText = categoryName;
                resetContainers(["subcategory-container", "subsubcategory-container", "subsubsubcategory-container",
                    "subsubsubsubcategory-container", "subsubsubsubsubcategory-container"
                ]);

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    if (categoryId === <?php echo e($category->id); ?>) {
                        <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            appendToContainer("subcategory-container", <?php echo e($child->id); ?>, "<?php echo e($child->name); ?>",
                                "showSubSubCategories");
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    }
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            function showSubSubCategories(subcategoryId, subcategoryName) {
                document.getElementById("subsubcategory-title").innerText = subcategoryName;
                resetContainers(["subsubcategory-container", "subsubsubcategory-container", "subsubsubsubcategory-container",
                    "subsubsubsubsubcategory-container"
                ]);

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        if (subcategoryId === <?php echo e($child->id); ?>) {
                            <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subchild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                appendToContainer("subsubcategory-container", <?php echo e($subchild->id); ?>, "<?php echo e($subchild->name); ?>",
                                    "showSubSubSubCategories");
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        }
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            function showSubSubSubCategories(subSubCategoryId, subSubCategoryName) {
                document.getElementById("subsubsubcategory-title").innerText = subSubCategoryName;
                resetContainers(["subsubsubcategory-container", "subsubsubsubcategory-container",
                    "subsubsubsubsubcategory-container"
                ]);

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subchild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            if (subSubCategoryId === <?php echo e($subchild->id); ?>) {
                                <?php $__currentLoopData = $subchild->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    appendToContainer("subsubsubcategory-container", <?php echo e($subSubChild->id); ?>,
                                        "<?php echo e($subSubChild->name); ?>", "showSubSubSubSubCategories");
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            }
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            function showSubSubSubSubCategories(subSubSubCategoryId, subSubSubCategoryName) {
                document.getElementById("subsubsubsubcategory-title").innerText = subSubSubCategoryName;
                resetContainers(["subsubsubsubcategory-container", "subsubsubsubsubcategory-container"]);

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subchild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $subchild->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                if (subSubSubCategoryId === <?php echo e($subSubChild->id); ?>) {
                                    <?php $__currentLoopData = $subSubChild->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubSubChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        appendToContainer("subsubsubsubcategory-container", <?php echo e($subSubSubChild->id); ?>,
                                            "<?php echo e($subSubSubChild->name); ?>", "showSubSubSubSubSubCategories");
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                }
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            function showSubSubSubSubSubCategories(subSubSubSubCategoryId, subSubSubSubCategoryName) {
                document.getElementById("subsubsubsubsubcategory-title").innerText = subSubSubSubCategoryName;
                resetContainers(["subsubsubsubsubcategory-container"]);

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subchild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $subchild->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $subSubChild->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubSubChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    if (subSubSubSubCategoryId === <?php echo e($subSubSubChild->id); ?>) {
                                        <?php $__currentLoopData = $subSubSubChild->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubSubSubChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            appendToContainer("subsubsubsubsubcategory-container", null,
                                                "<?php echo e($subSubSubSubChild->name); ?>");
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    }
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            // Utility Functions
            function resetContainers(containerIds) {
                containerIds.forEach(id => document.getElementById(id).innerHTML = "");
            }

            function appendToContainer(containerId, id, name, clickHandler = "") {
                const container = document.getElementById(containerId);
                const clickAction = clickHandler ? `onclick="${clickHandler}(${id}, '${name}')"` : "";
                container.innerHTML += `<div class="subcategory-box" ${clickAction}">${name}</div>`;
            }
        </script>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-porject\resources\views/frontend/category/index.blade.php ENDPATH**/ ?>