var reglage =
{
  blocPost: document.getElementById('blocAdministration'),
  blocComment: document.getElementById('blocAdministration2'),
  button1: document.getElementById('buttonJs1'),
  button2: document.getElementById('buttonJs2'),
  addChapterButton: document.getElementById('Add_chapter'),
  addChapter: document.getElementById('Ajoutchapitre'),
  TableChapter: document.getElementById('BlocDeleteChapter'),

  initClickButton1: function()
  {
    reglage.button1.addEventListener('click', function()
    {
      reglage.blocPost.style.display = 'block';
      reglage.blocComment.style.display = 'none';
    });
  },
  initClickButton2: function()
  {
    reglage.button2.addEventListener('click', function()
    {
      reglage.blocComment.style.display = 'block';
      reglage.blocPost.style.display = 'none';
    });
  },
  initClickChapterButton: function()
  {
    reglage.addChapterButton.addEventListener('click', function()
    {
      reglage.addChapter.style.display = 'block';
      reglage.TableChapter.style.display = 'none';
    });
  }
}
reglage.initClickButton1();
reglage.initClickButton2();
reglage.initClickChapterButton();
