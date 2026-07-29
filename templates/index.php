<?php
script('video_brief_board', 'brief');
style('video_brief_board', 'brief');
?>

<div id="video-brief-board" class="video-brief-board">
  <header>
    <h1>Video Brief Board</h1>
    <p>Turn a visual idea into a reviewable shot brief and save it to ownCloud.</p>
  </header>

  <form id="video-brief-form">
    <label>
      Brief title
      <input name="title" required maxlength="120" placeholder="Launch clip for the summer product line">
    </label>

    <label>
      Subject and setting
      <textarea name="subject" required rows="3" placeholder="Describe the product, environment, lighting, and key visual details."></textarea>
    </label>

    <div class="brief-grid">
      <label>
        Duration
        <input name="duration_seconds" type="number" min="1" max="300" value="15">
      </label>
      <label>
        Aspect ratio
        <select name="aspect_ratio">
          <option>16:9</option>
          <option>9:16</option>
          <option>1:1</option>
          <option>4:5</option>
        </select>
      </label>
    </div>

    <label>
      Subject motion
      <textarea name="motion" rows="3" placeholder="State what moves, when it moves, and what must remain stable."></textarea>
    </label>

    <label>
      Camera treatment
      <textarea name="camera" rows="3" placeholder="Describe framing, lens feel, camera path, and pacing."></textarea>
    </label>

    <label>
      Constraints
      <textarea name="constraints" rows="3" placeholder="List brand, continuity, text, safety, or asset constraints."></textarea>
    </label>

    <label>
      Review notes
      <textarea name="review_notes" rows="3" placeholder="Define the checks required before the concept moves forward."></textarea>
    </label>

    <div class="brief-actions">
      <button type="submit" class="primary">Save brief to ownCloud</button>
      <a href="https://kling3ai.co/" target="_blank" rel="noopener noreferrer">Explore a browser-based motion concept workflow</a>
    </div>

    <p id="video-brief-status" role="status" aria-live="polite"></p>
  </form>
</div>
