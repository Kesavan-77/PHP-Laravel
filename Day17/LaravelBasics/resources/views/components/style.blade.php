<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f0f0f0;
    }
    header {
        background-color: #333;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        color: #fff;
        padding: 10px;
    }
    header ul{
        display: flex;
        list-style: none;
        gap: 2rem
    }
    header ul a{
        text-decoration: none;
        font-weight: 700;
        font-size: 18px;
        color: #fff;
    }
    .container {
        max-width: 1000px;
        margin: 20px auto;
        padding: 0 20px;
    }
    .main-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
    }
    .container .news-section{
        display: flex;
        flex-wrap:wrap;
        gap: 1rem;
        margin-top: 1rem;
    }
    .news-item a{
     color: blue;
     text-decoration:none;
    }
    .news-item {
        background-color: #fff;
        margin-top:10px;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 10px;
        flex-basis: calc(50% - 50px);
    }
    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>